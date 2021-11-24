<?php

namespace App\Controllers;

use App\Models\AddTaskModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class AddTaskController
{
    private PhpRenderer $renderer;
    private AddTaskModel $addTaskModel;

    public function __construct(PhpRenderer $renderer, AddTaskModel $addTaskModel)
    {
        $this->renderer = $renderer;
        $this->addTaskModel = $addTaskModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $data): ResponseInterface
    {
        $data = $request->getParsedBody();
        $this->addTaskModel->addNewTask($data);
//        return $this->renderer->render($response, 'view.phtml', ['data' => $data]);
        return $response->withHeader('Location', './todo');
    }
}