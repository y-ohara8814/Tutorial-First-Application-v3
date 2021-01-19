<?php

namespace App\Action;

use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

abstract class Action
{
    protected $renderer;
    protected $db;
    protected $twig;

    public function __construct(ContainerInterface $container)
    {
        $this->renderer = $container['renderer'];
        $this->db = $container['db'];
        $this->twig = $container['twig'];
    }
}
