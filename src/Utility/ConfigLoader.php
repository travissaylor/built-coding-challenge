<?php

namespace App\Utility;

use Noodlehaus\Config;

class ConfigLoader
{
    /**
     * Get an item from the specified config
     *
     * @param string $dots
     * @param mixed $default
     * @return mixed
     */
    public static function config(string $dots, $default = null)
    {
        $conf = new Config(BASE_PATH . '/config/app.php');

        return $conf->get($dots, $default);
    }
}