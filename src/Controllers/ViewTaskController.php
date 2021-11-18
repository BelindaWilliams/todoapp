<?php

namespace App\Controllers;

use App\Models\ViewTaskModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class ViewTaskController
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
        $task = $this->viewTaskModel->get($args['id']);

        return $this->renderer->render($response, 'view.phtml', ['task' => $task]);
    }
}