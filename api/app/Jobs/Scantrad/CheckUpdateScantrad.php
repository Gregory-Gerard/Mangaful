<?php

namespace App\Jobs\Scantrad;

use App\Chapter;
use App\Manga;
use Goutte\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CheckUpdateScantrad implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $manga;

    /**
     * Create a new job instance.
     *
     * @param Manga $manga
     *
     * @return void
     */
    public function __construct(Manga $manga)
    {
        $this->manga = $manga;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        $chapter_list_already_downloaded = $this->manga->chapters->pluck('number');

        $client = new Client();
        $scrapper = $client->request('GET', $this->manga->scrapping_url);

        $available_chapter_on_source = [];
        $scrapper->filter('.chl-num')->each(function ($node) use (&$available_chapter_on_source) {
            preg_match("/([0-9\.]+)/", $node->text(), $chapter_number);
            $download = $node->parents()->filter('.chr-button[href*="download"]')->link();

            $available_chapter_on_source[$chapter_number[1]] = [
                'url' => $download->getUri(),
                'title' => $node->siblings()->filter('.chl-titre')->text(),
                'number' => $chapter_number[1]
            ];
        });

        if (count($available_chapter_on_source) === 0) throw new \Exception("0 chapter available. Maybe Scantrad updated their code ?");

        $chapters_to_download = array_diff_key($available_chapter_on_source, array_flip($chapter_list_already_downloaded->toArray()));

        if (count($chapters_to_download) > 0) {
            foreach ($chapters_to_download as $number => $chapter_to_download) {
                $chapter = new Chapter;
                $chapter->number = $number;
                $chapter->title = $chapter_to_download['title'];

                $this->manga->chapters()->save($chapter);

                DownloadChapterScantrad::dispatch($chapter, $chapter_to_download['url']);
            }
        }
    }
}
