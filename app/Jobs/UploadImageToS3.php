<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadImageToS3 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    protected $path;

    /**
     * Create a new job instance.
     */
    public function __construct($file, $path)
    {
        $this->file = $file;
        $this->path = $path;
    }

    /**
     * Execute the job.
     */
    public function handle(): string
    {
      return  $this->file->storeAs('capas', $this->path, 's3');
    }
}
