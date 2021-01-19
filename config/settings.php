<?php

$settings = [];

$settings['displayErrorDetails'] = true;
$settings['determineRouteBeforeAppMiddleware'] = true;
$settings['addContentLengthHeader'] = false;

$settings['root'] = dirname(__DIR__);
$settings['temp'] = $settings['root'] . '/tmp';
$settings['public'] = $settings['root'] . '/public';

$settings['twig'] = [
    'path' => $settings['root'] . '/templates',
    'cache_enabled' => true,
    'cache_path' => $settings['temp'] . '/twig-cache',
    'auto_reload' => true
  ];

  $settings['logger'] = [
    'name'        => 'app',
    'file'        => $settings['temp'] . '/logs/app.log',
    'level'       => \Monolog\Logger::ERROR,
    'date_format' => 'Y-m-d H:i:s',
    'output'      => "[%datetime%] %level_name%: %message% %context% %extra%\n",
  ];

  $settings['db'] = [
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'user' => 'ohara',
    'pass' => '0000',
    'dbname' => 'slim_tutorial',
    'charset' => 'utf8',
    'collection' => 'utf8_unicode_ci',
    'flags' => [
      PDO::ATTR_PERSISTENT => false,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
  ];

  $settings['renderer'] = [
    'template_path' => __DIR__ . '/../templates/',
  ];

return $settings;

