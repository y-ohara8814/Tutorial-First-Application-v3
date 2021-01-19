<?php

namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;

final class ScrollAction extends Action
{
    public function index(Request $request, Response $response)
    {
        return $this->twig->render($response, 'scroll.twig');
    }
}
