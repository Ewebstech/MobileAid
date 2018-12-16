<?php 

namespace App\Http\Controllers;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Utils\Commands;

Class PhpShell{

    public static function runProcess(){
    
        $process = new Process(Commands::getCommands('LS'));
        $process->run();
    
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    
        echo $process->getOutput();
    }

}
