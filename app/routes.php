<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', function ($request, $response, $args) use ($container) {
        $renderer = $container->get('renderer');
        return $renderer->render($response, "index.php", $args);
    });

    $app->post('/todo', 'AddTaskController');

    $app->get('/todo', 'ViewTaskController');

    $app->post('/markComplete/{id}', 'MarkCompleteController');

    $app->post('/undoComplete/{id}', 'UndoCompleteController');

    $app->post('/deleteTask/{id}', 'DeleteTaskController');
};
