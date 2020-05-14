<?php

namespace App\Jobs;

use App\Jobs\Scantrad\CheckUpdateScantrad;
use App\Manga;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CheckUpdateForAllMangas implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach (Manga::all() as $manga) {
            if (strpos($manga->scrapping_url, 'scantrad') !== -1) CheckUpdateScantrad::dispatch($manga);
            else Log::error('Scrapper not implemented yet!');
        }
    }
}
