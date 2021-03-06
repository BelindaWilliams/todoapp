<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    };

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['dbConnection'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['db'];
        $db = new PDO($settings['host'] . $settings['dbname'], $settings['username'], $settings['password']);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    };

    $container['AddTaskModel'] = DI\Factory('App\Factories\AddTaskModelFactory');
    $container['AddTaskController'] = DI\Factory('App\Factories\AddTaskControllerFactory');

    $container['ViewTaskModel'] = DI\Factory('App\Factories\ViewTaskModelFactory');
    $container['ViewTaskController'] = DI\Factory('App\Factories\ViewTaskControllerFactory');

    $container['DeleteTaskController'] = DI\Factory('\App\Factories\DeleteTaskControllerFactory');
    $container['MarkCompleteController'] = DI\Factory('\App\Factories\MarkCompleteControllerFactory');
    $container['UndoCompleteController'] = DI\Factory('\App\Factories\UndoCompleteControllerFactory');

    $containerBuilder->addDefinitions($container);
};
