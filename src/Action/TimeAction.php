<?php

namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;

final class TimeAction extends Action
{
    public function __invoke(Request $request, Response $response)
    {
        $viewData = [
            'now' => date('Y-m-d H:i:s')
        ];
        return $this->twig->render($response, 'time.twig', $viewData);
    }
}
