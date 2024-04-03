<?php

declare(strict_types=1);

namespace App\Application\Actions\Product;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Action;

class ViewProductAction extends Action
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $twig = $this->get('twig');

        $html = $twig->render('index.twig', ['name' => 'Pedro']);

        $this->response->getBody()->write($html);

        return $this->response;

        $product = [
            'id' => 1,
            'name' => 'Foo',
            'price' => 97.00
        ];

        return $this->respondWithData($product);
    }
}
