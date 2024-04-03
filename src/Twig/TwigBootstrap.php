<?php

namespace App\Twig;

use Twig\TwigFilter;

class TwigBootstrap
{
    public function __construct()
    {
    }

    public function registerFilters($twig)
    {
        $assetUrl = new TwigFilter('asset_url', function ($string) {
            return "Templates/assets/$string";
        });

        $twig->addFilter($assetUrl);
    }

    public function initialize()
    {
        $loader = new \Twig\Loader\FilesystemLoader('Templates');
        $twig = new \Twig\Environment($loader);

        $this->registerFilters($twig);

        return $twig;
    }
}
