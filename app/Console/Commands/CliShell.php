<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\PhpShell;



class CliShell extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'php-shell';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs any cli command e.g git add --all e.t.c.';

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
        $shell = PhpShell::runProcess();
        return $shell;
    }
}
