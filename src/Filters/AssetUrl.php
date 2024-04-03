<?php

use Twig\TwigFilter;

$filter = new TwigFilter('asset_url', function ($string) {
    return "assets/$string";
});

$twig->addFilter($filter);