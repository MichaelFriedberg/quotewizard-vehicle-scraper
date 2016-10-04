<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScrapeYears extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:years';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape years';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
