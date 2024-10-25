<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Image\Image;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = storage_path('app/public/test.jpeg');
        $pathSave = storage_path('app/public/output.jpg');
        Image::load($path)->width(1600)->save($pathSave);
        dd('ok');
    }
}
