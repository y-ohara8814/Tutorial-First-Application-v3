<?php

use Slim\Container;
use Slim\Views\Twig;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/** @var \Slim\App $app */
$container = $app->getContainer();

// Activating routes in a subfolder
$container['environment'] = function () {
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $_SERVER['SCRIPT_NAME'] = dirname(dirname($scriptName)) . '/' . basename($scriptName);
    return new Slim\Http\Environment($_SERVER);
};

// $container[Twig::class] = function (Container $container) {
$container['twig'] = function (Container $container) {
    $settings = $container->get('settings');
    $viewPath = $settings['twig']['path'];

    $twig = new Twig($viewPath, [
      'cache' => $settings['twig']['cache_enabled'] ? $settings['twig']['cache_path'] : false,
      'auto_reload' => true
    ]);

    $loader = $twig->getLoader();
    $loader->addPath($settings['public'], 'public');

    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment($container->get('environment'));
    $twig->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $twig;
  };

$container[LoggerInterface::class] = function (Container $container) {
    $settings = $container->get('settings')['logger'];
    $level = isset($settings['level']) ? $settings['level'] : Logger::ERROR;
    $logFile = $settings['file'];
    $date_format = $settings['date_format'];
    $output = $settings['output'];
    $formatter = new LineFormatter($output, $date_format);

    $logger = new Logger($settings['name']);
    $handler = new RotatingFileHandler($logFile, 0, $level, true, 0775);
    $handler->setFormatter($formatter);
    $logger->pushHandler($handler);

    return $logger;
};

// $container[\App\Action\HomeIndexAction::class] = function (Container $container) {
//     $twig = $container->get(\Slim\Views\Twig::class);
//     return new \App\Action\HomeIndexAction($twig);
// };

$container['db'] = function (Container $container) {
    $settings = $container->get('settings');

    $host = $settings['db']['host'];
    $dbname = $settings['db']['dbname'];
    $username = $settings['db']['user'];
    $password = $settings['db']['pass'];

    $dsn = "mysql:host=$host;dbname=$dbname";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => false,
        PDO::ATTR_EMULATE_PREPARES => true,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    return new PDO($dsn, $username, $password, $options);
};

$container['renderer'] = function (Container $c) {
    $settings = $c->get('settings')['renderer'];
    return new \Slim\Views\PhpRenderer($settings['template_path']);
};
