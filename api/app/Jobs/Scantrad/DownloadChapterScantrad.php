<?php

namespace App\Jobs\Scantrad;

use App\Chapter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\Events\JobExceptionOccurred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class DownloadChapterScantrad implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $chapter;
    protected $url;

    /**
     * Delete the job if its models no longer exist.
     *
     * @var bool
     */
    public $deleteWhenMissingModels = true;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Chapter $chapter, $url)
    {
        $this->chapter = $chapter;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function handle()
    {
        $zip_name = "tmp/".uniqid().".zip";
        $zip_content = @file_get_contents($this->url);

        if ($zip_content === false) throw new \Exception("ZIP from Scantrad unreachable");

        Storage::put($zip_name, $zip_content);

        $zip = new ZipArchive();
        if ($zip->open(storage_path("app/{$zip_name}"))) {
            Storage::makeDirectory("public/chapters/{$this->chapter->id}");

            $files = [];
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $files[] = $zip->getNameIndex($i);
            }

            natsort($files);

            $zip->extractTo(storage_path("app/public/chapters/{$this->chapter->id}"), $files);

            $pages = [];
            foreach ($files as $index => $file) {
                $pages[] = [
                    'index' => $index,
                    'image' => "chapters/{$this->chapter->id}/".basename($file)
                ];
            }

            $this->chapter->pages()->createMany($pages);

            $zip->close();

            Storage::delete($zip_name);
        } else {
            throw new \Exception("ZIP from Scantrad corrupted");
        }
    }

    /**
     * The job failed to process.
     *
     * @param \Exception $exception
     *
     * @return void
     */
    public function failed(\Exception $exception)
    {
        // if we can't download pages for any reason,
        // we delete the chapter so the job can try later and
        // chapter will not be empty
        $this->chapter->delete();
    }
}
