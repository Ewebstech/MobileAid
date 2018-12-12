<?php 

namespace App\Utils;


class Packages
{
    private static $packages = [
        'SILVER' => [
            "Title" => "Silver",
            "Price" => "2000",
            "LocalMaxCalls" => "1",
            "IntMaxCalls" => "0"
        ],
        'GOLD' => [
            "Title" => "Gold",
            "Price" => "5000",
            "LocalMaxCalls" => "2",
            "IntMaxCalls" => "0"
        ],
        'TITANIUM' => [
            "Title" => "Titanium",
            "Price" => "25000",
            "MaxCalls" => "3",
            "IntMaxCalls" => "2"
        ],
        'DIAMOND' =>[
            "Title" => "Diamond",
            "Price" => "65000",
            "MaxCalls" => "5",
            "IntMaxCalls" => "3"
        ]
                
    ];


    public static function getPackage($name)
    {
        return self::$packages[$name];
    }

}