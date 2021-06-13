<?php

namespace App\Builders;

use App\Utility\ConfigLoader;
use League\Plates\Engine;

class TemplateBuilder
{
    /**
     * Render dynamic output from template file.
     * Getting the correct template directory from config
     *
     * @param string $file
     * @param array $data
     * @return string
     */
    public function renderTemplate(string $file, array $data = []): string
    {
        $templatePath = ConfigLoader::config('templateDirectory');

        $templates = new Engine($templatePath);
        return $templates->render($file, $data);
    }
}
