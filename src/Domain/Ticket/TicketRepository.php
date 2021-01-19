<?php

namespace App\Domain\Ticket;

use DomainException;
use PDO;

final class TicketRepository
{
    private $PDO;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getTicketById(int $id): array
    {
        $sql = 'SELECT * FROM tickets WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        if (empty($row)) {
            throw new DomainException(sprintf('Ticket not found: %s', $id));
        }

        return $row ?: [];
    }

    public function getTickets(): array
    {
        $sql = 'SELECT * FROM tickets';
        $stmt = $this->pdo->query($sql);
        $tickets = [];
        while($row =$stmt->fetch()) {
            $tickets[] = $row;
        }
        if (empty($tickets)) {
            throw new DomainException('Tickets not found');
        }
        return $tickets ?: [];
    }

    public function insertTicket($subject): bool
    {
        $sql = 'INSERT INTO tickets (subject) values (:subject)';
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(['subject' => $subject]);
        if (!$result) {
            throw new DomainException('could not save the ticket');
        }
        return $result;
    }

    public function updateTicket($ticket): bool
    {
        $bool_flg = true;

        try {
            $selectTicket = $this->getTicketById($ticket['id']);
        } catch (DomainException $e) {
            $bool_flg = false;
        }

        if ($bool_flg) {

            $sql = 'UPDATE tickets SET subject = :subject WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($ticket);
        }

        return $bool_flg;
    }

    public function deleteTicket(int $id): bool
    {
        $bool_flg = true;
        try {
            $ticket = $this->getTicketById($id);
        } catch (DomainException $e) {
            $bool_flg = false;
        }

        if ($bool_flg) {

            $sql = 'DELETE FROM tickets WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $ticket['id']]);
        }

        return $bool_flg;
    }
}
