<?php

namespace App\Jobs;

use App\Services\Interfaces\Parser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParsingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected string $src_name;
    protected string $src_url;
    /**
     * Create a new job instance.
     */
    public function __construct(string $src_name ,string $src_url)
    {
        $this->src_name = $src_name;
        $this->src_url = $src_url;
    }

    /**
     * Execute the job.
     */
    public function handle(Parser $parser): void
    {
        $parser->parseTheResource($this->src_name, $this->src_url)->saveParseData();
    }
}
