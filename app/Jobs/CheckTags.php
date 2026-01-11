<?php

namespace App\Jobs;

use App\Models\WatchJob;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;

class CheckTags implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public function __construct()
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $jobs = WatchJob::all();

        Log::info('checking tags');

        foreach ($jobs as $job){
            Queue::push(new ScrapeTags($job));
        }
    }
}
