<?php

namespace App\Utility;

use Noodlehaus\Config;

class ConfigLoader
{
    public static function config($dots, $default = null)
    {
        $conf = new Config(BASE_PATH . '/config/app.php');

        return $conf->get($dots, $default);
    }
}