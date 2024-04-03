<?php

namespace App\Controllers;

use App\Twig\BaseTemplateService;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class ProductsController
{
    protected $container;
    protected $twig;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->twig = $container->get('twig');
    }
    
    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $baseTemplateService = new BaseTemplateService();
        $baseTemplateService->categories();

        $html = $this->twig->render('index.twig', [
            'settings' => [
                'fonts_texts_size' => '15px',
                'fonts_titles_family' => 'Inter'
            ]
        ]);

        $response->getBody()->write($html);

        return $response;
    }
}
