<?php

namespace App\Builders;

use App\Utility\ConfigLoader;
use League\Plates\Engine;

class TemplateBuilder
{
    public function renderTemplate(string $file, array $data = [])
    {
        $templatePath = ConfigLoader::config('templateDirectory');

        $templates = new Engine($templatePath);
        return $templates->render($file, $data);
    }
}