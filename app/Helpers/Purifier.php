<?php

namespace App\Helpers;

use HTMLPurifier;
use HTMLPurifier_Config;

class Purifier
{
    public static function clean($html)
    {
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        return $purifier->purify($html);
    }
}
