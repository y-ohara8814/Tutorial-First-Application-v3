<?php

namespace App\Domain\Ticket;

final class TicketService
{
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function getTicketById(int $id): array
    {
        $ticketRow = $this->ticketRepository->getTicketById($id);
        return $ticketRow;
    }

    public function getTickets(): array
    {
        $ticketRows = $this->ticketRepository->getTickets();
        return $ticketRows;
    }

    public function insertTicket($subject): bool
    {
        $result = $this->ticketRepository->insertTicket($subject);
        return $result;
    }

    public function updateTicket($ticket): bool
    {
        $result = $this->ticketRepository->updateTicket($ticket);
        return $result;
    }

    public function deleteTicket(int $id): bool
    {
        $result = $this->ticketRepository->deleteTicket($id);
        return $result;
    }
}
