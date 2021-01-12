<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Classes\Controllers\TicketsController;

return function (App $app) {
    $container = $app->getContainer();

    // 一覧表示
    // $app->get('/tickets', function (Request $request, Response $response) {
    //     $sql = 'SELECT * FROM tickets';
    //     $stmt = $this->db->query($sql);
    //     $tickets = [];
    //     while($row = $stmt->fetch()) {
    //         $tickets[] = $row;
    //     }
    //     $data = ['tickets' => $tickets];
    //     return $this->renderer->render($response, 'tickets/index.phtml', $data);
    // });
    $app->get('/tickets', TicketsController::class . ':index');

    // 新規作成用フォームの表示
    // $app->get('/tickets/create', function (Request $request, Response $response) {
    //     return $this->renderer->render($response, 'tickets/create.phtml');
    // });
    $app->get('/tickets/create', TicketsController::class . ':create');


    // 新規作成
    // $app->post('/tickets', function (Request $request, Response $response) {
    //     $subject = $request->getParsedBodyParam('subject');
    //     // ここに保存の処理を書く
    //     $sql = 'INSERT INTO tickets (subject) values (:subject)';
    //     $stmt = $this->db->prepare($sql);
    //     $result = $stmt->execute(['subject' => $subject]);
    //     if (!$result) {
    //         throw new \Exception('could not save the ticket');
    //     }

    //     return $response->withRedirect("/tickets");
    // });
    $app->post('/tickets', TicketsController::class . ':store');


    // 表示
    // $app->get('/tickets/{id}', function (Request $request, Response $response, array $args) {
    //     $sql = 'SELECT * FROM tickets WHERE id = :id';
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute(['id' => $args['id']]);
    //     $ticket = $stmt->fetch();
    //     if (!$ticket) {
    //         return $response->withStatus(404)->write('not found');
    //     }
    //     $data = ['ticket' => $ticket];
    //     return $this->renderer->render($response, 'tickets/show.phtml', $data);
    // });
    $app->get('/tickets/{id}', TicketsController::class . ':show');


    // 編集用フォームの表示
    // $app->get('/tickets/{id}/edit', function (Request $request, Response $response, array $args) {
    //     $sql = 'SELECT * FROM tickets WHERE id = :id';
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute(['id' => $args['id']]);
    //     $ticket = $stmt->fetch();
    //     if (!$ticket) {
    //         return $response->withStatus(404)->write('not found');
    //     }
    //     $data = ['ticket' => $ticket];
    //     return $this->renderer->render($response, 'tickets/edit.phtml', $data);
    // });
    $app->get('/tickets/{id}/edit', TicketsController::class . ':edit');


    // 更新
    // $app->patch('/tickets/{id}', function (Request $request, Response $response, array $args) {
    //     $sql = 'SELECT * FROM tickets WHERE id = :id';
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute(['id' => $args['id']]);
    //     $ticket = $stmt->fetch();
    //     if (!$ticket) {
    //         return $response->withStatus(404)->write('not found');
    //     }
    //     $ticket['subject'] = $request->getParsedBodyParam('subject');
    //     $stmt = $this->db->prepare('UPDATE tickets SET subject = :subject WHERE id = :id');
    //     $stmt->execute($ticket);
    //     return $response->withRedirect("/tickets");
    // });
    $app->patch('/tickets/{id}', TicketsController::class . ':update');


    // 削除
    // $app->delete('/tickets/{id}', function (Request $request, Response $response, array $args) {
    //     $sql = 'SELECT * FROM tickets WHERE id = :id';
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute(['id' => $args['id']]);
    //     $ticket = $stmt->fetch();
    //     if (!$ticket) {
    //         return $response->withStatus(404)->write('not found');
    //     }
    //     $stmt = $this->db->prepare('DELETE FROM tickets WHERE id = :id');
    //     $stmt->execute(['id' => $ticket['id']]);
    //     return $response->withRedirect("/tickets");
    // });
    $app->delete('/tickets/{id}', TicketsController::class . ':delete');


    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });
};
