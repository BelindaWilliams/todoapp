<?php

namespace App\Controllers;

use App\Models\ViewTaskModel;

class MarkCompleteController
{
    private ViewTaskModel $viewTaskModel;

    public function __construct($viewTaskModel)
    {
        $this->viewTaskModel = $viewTaskModel;
    }

    public function __invoke($request, $response, array $args)
    {
        $id = $args['id'];
        $this->viewTaskModel->markAsCompleted($id);
        return $response->withHeader('Location', '/todo');
    }
}