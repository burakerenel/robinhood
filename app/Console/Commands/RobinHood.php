<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\RobinHoodController;

class RobinHood extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'robin:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Robin Hood botunu calistirir.';

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
        $robin = new RobinHoodController;
        $robin->start();
        return 0;
    }
}
