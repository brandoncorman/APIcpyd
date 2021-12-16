<?php

namespace App\Console\Commands;

use App\Http\Controllers\ScrapingController;
use Illuminate\Console\Command;

class everyFiveMinutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will run the scraper every 5 min.';

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
     * @return int
     */
    public function handle()
    {
        $scraper = new ScrapingController;
        $scraper->scraper();
        return 0;
    }
}
