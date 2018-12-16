<?php 

namespace App\Utils;


class Commands
{

    public static function getCommands($type)
    {
        $type = "LS";
        $command = [];
        if($type == "LS"){
            $command = array(
                'ls',
                
            );
        }

        return $command;
    }
}