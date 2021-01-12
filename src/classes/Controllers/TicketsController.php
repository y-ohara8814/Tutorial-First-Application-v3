<?php

namespace Classes\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class TicketsController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $sql = 'SELECT * FROM tickets';
        $stmt = $this->db->query($sql);
        $tickets = [];
        while($row = $stmt->fetch()) {
            $tickets[] = $row;
        }
        $data = ['tickets' => $tickets];
        return $this->renderer->render($response, 'tickets/index.phtml', $data);
    }

    public function create(Request $request, Response $response)
    {
        return $this->renderer->render($response, 'tickets/create.phtml');
    }

    public function store(Request $request, Response $response)
    {
        $subject = $request->getParsedBodyParam('subject');
        $sql = 'INSERT INTO tickets (subject) values (:subject)';
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['subject' => $subject]);
        if (!$result) {
            throw new \Exception('could not save the ticket');
        }

        return $response->withRedirect("/tickets");
    }
    public function show(Request $request, Response $response, array $args)
    {
        // $sql = 'SELECT * FROM tickets WHERE id = :id';
        // $stmt = $this->db->prepare($sql);
        // $stmt->execute(['id' => $args['id']]);
        // $ticket = $stmt->fetch();
        // if (!$ticket) {
        //     return $response->withStatus(404)->write('not found');
        // }
        try {
            $ticket = $this->fetchTicket($args['id']);
        } catch(\Exception $e){
            return $response->withStatus(404)->write($e->getMessage());
        }
        $data = ['ticket' => $ticket];
        return $this->renderer->render($response, 'tickets/show.phtml', $data);
    }
    public function edit(Request $request, Response $response, array $args)
    {
        try {
            $ticket = $this->fetchTicket($args['id']);
        } catch(\Exception $e){
            return $response->withStatus(404)->write($e->getMessage());
        }
        $data = ['ticket' => $ticket];
        return $this->renderer->render($response, 'tickets/edit.phtml', $data);
    }
    public function update(Request $request, Response $response, array $args)
    {
        try {
            $ticket = $this->fetchTicket($args['id']);
        } catch(\Exception $e){
            return $response->withStatus(404)->write($e->getMessage());
        }
        $ticket['subject'] = $request->getParsedBodyParam('subject');
        $stmt = $this->db->prepare('UPDATE tickets SET subject = :subject WHERE id = :id');
        $stmt->execute($ticket);
        return $response->withRedirect("/tickets");
    }
    public function delete(Request $request, Response $response, array $args)
    {
        try {
            $ticket = $this->fetchTicket($args['id']);
        } catch(\Exception $e){
            return $response->withStatus(404)->write($e->getMessage());
        }
        $stmt = $this->db->prepare('DELETE FROM tickets WHERE id = :id');
        $stmt->execute(['id' => $ticket['id']]);
        return $response->withRedirect("/tickets");
    }

    private function fetchTicket($id): array
    {
        $sql = 'SELECT * FROM tickets WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $ticket = $stmt->fetch();
        if (!$ticket) {
            throw new \Exception('user not found');
        }
        return $ticket;
    }
}
