<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;
// use Slim\Views\Twig;

final class HomeIndexAction extends Action
{
    // /**
    //  * @var Twig
    //  */
    // private $twig;

    // /**
    //  * Constructor.
    //  *
    //  * @param Twig $twig
    //  */
    // public function __construct(Twig $twig)
    // {
    //     $this->twig = $twig;
    // }

    /**
     * Action.
     *
     * @param Request $request the request
     * @param Response $response the response
     *
     * @return ResponseInterface the response
     */
    public function __invoke(Request $request, Response $response): ResponseInterface
    {
        $viewData = [
            'name' => 'Ohara',
        ];

        return $this->twig->render($response, 'Home/home-index.twig', $viewData);
    }
}
