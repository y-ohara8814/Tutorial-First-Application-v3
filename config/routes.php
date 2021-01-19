<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Psr\Log\LoggerInterface;

$app->get('/', function(ServerRequestInterface $request, ResponseInterface $response) {
    $response->getBody()->write("It works! This is the default welcome page");

    return $response;
})->setName('root');

$app->get('/hello/{name}', function(ServerRequestInterface $request, ResponseInterface $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

// $app->get('/time', function (Request $request, Response $response) {
//     $viewData = [
//         'now' => date('Y-m-d H:i:s')
//     ];

//     return $this->get(Twig::class)->render($response, 'time.twig', $viewData);
// });
$app->get('/time', \App\Action\TimeAction::class);

$app->get('/scroll', \App\Action\ScrollAction::class . ':index');

$app->get('/logger-test', function (Request $request, Response $response) {
    /** @var Container $this */
    /** @var LoggerInterface $logger */

    $logger = $this->get(LoggerInterface::class);
    $logger->error('My error message!');

    $response->getBody()->write("Success");

    return $response;
});

$app->any('/ping', \App\Action\PingAction::class);

$app->get('/home', \App\Action\HomeIndexAction::class);

// $app->get('/tickets', function (Request $request, Response $response) {
//     $sql = 'SELECT * FROM tickets';
//     $stmt = $this->db->query($sql);
//     $tickets = [];
//     while($row = $stmt->fetch()) {
//         $tickets[] = $row;
//     }
//     $data = ['tickets' => $tickets];
//     // return $this->renderer->render($response, 'tickets/index.phtml', $data);
//     return $this->get(Twig::class)->render($response, 'tickets/index.twig', $data);
// });

$app->get('/tickets', \App\Action\TicketAction::class . ':index');

$app->get('/tickets/create', \App\Action\TicketAction::class . ':create');

$app->post('/tickets', \App\Action\TicketAction::class . ':store');

$app->get('/tickets/{id}', \App\Action\TicketAction::class . ':show');

$app->get('/tickets/{id}/edit', \App\Action\TicketAction::class . ':edit');

$app->patch('/tickets/{id}', \App\Action\TicketAction::class . ':update');

$app->delete('/tickets/{id}', \App\Action\TicketAction::class . ':delete');
