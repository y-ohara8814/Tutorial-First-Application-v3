<?php

namespace App\Action;

use App\Domain\Ticket\TicketRepository;
use App\Domain\Ticket\TicketService;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class TicketAction extends Action
{
    public function index(Request $request, Response $response)
    {
        $repository = new TicketRepository($this->db);
        $service = new TicketService($repository);
        $tickets = $service->getTickets();
        $data = ['tickets' => $tickets];
        return $this->twig->render($response, 'tickets/index.twig', $data);
    }

    public function create(Request $request, Response $response) // 新規作成ページ表示
    {
      return $this->twig->render($response, 'tickets/create.twig');
    }

    public function store(Request $request, Response $response) // 新規登録実行
    {
      $repository = new TicketRepository($this->db);
      $service = new TicketService($repository);
      $subject = $request->getParsedBodyParam('subject');
      $result = $service->insertTicket($subject);
      return $response->withRedirect('/tickets');
    }

    public function show(Request $request, Response $response, array $args) // 詳細情報表示
    {
      $repository = new TicketRepository($this->db);
      $service = new TicketService($repository);
      try {
        $ticket = $service->getTicketById($args['id']);
      } catch (\Exception $e) {
        return $response->withStatus(404)->write($e->getMessage());
      }
      $data = ['ticket' => $ticket];
      return $this->twig->render($response, 'tickets/show.twig', $data);
    }

    public function edit(Request $request, Response $response, array $args) // 編集画面表示
    {
      $repository = new TicketRepository($this->db);
      $service = new TicketService($repository);
      try {
        $ticket = $service->getTicketById($args['id']);
      } catch (\Exception $e) {
        return $response->withStatus(404)->write($e->getMessage());
      }
      $data = ['ticket' => $ticket];
      return $this->twig->render($response, 'tickets/edit.twig', $data);
    }

    public function update(Request $request, Response $response, array $args) // 編集内容の登録実行
    {
      $repository = new TicketRepository($this->db);
      $service = new TicketService($repository);
      try {
        $ticket = $service->getTicketById($args['id']);
      } catch (\Exception $e) {
        return $response->withStatus(404)->write($e->getMessage());
      }
      $ticket['subject'] = $request->getParsedBodyParam('subject');
      $result = $service->updateTicket($ticket);
      return $response->withRedirect("/tickets");
    }

    public function delete(Request $request, Response $response, array $args) // データ削除
    {
      $repository = new TicketRepository($this->db);
      $service = new TicketService($repository);
      try {
        $ticket = $service->getTicketById($args['id']);
      } catch (\Exception $e) {
        return $response->withStatus(404)->write($e->getMessage());
      }
      $result = $service->deleteTicket($ticket['id']);
      return $response->withRedirect("/tickets");
    }
}
