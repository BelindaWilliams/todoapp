<?php

namespace App\Controllers;

use App\Models\ViewTaskModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class ViewIncompleteTaskController
{
    private PhpRenderer $renderer;
    private ViewTaskModel $viewTaskModel;

    public function __construct(PhpRenderer $renderer, ViewTaskModel $viewTaskModel)
    {
        $this->renderer = $renderer;
        $this->viewTaskModel = $viewTaskModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $tasks = $this->viewTaskModel->getIncompleteTasks();

        return $this->renderer->render($response, 'view.phtml', ['tasks' => $tasks]);
    }
}