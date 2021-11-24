<?php


namespace App\Controllers;

use App\Models\ViewTaskModel;

class DeleteTaskController
{
    private ViewTaskModel $viewTaskModel;

    public function __construct(ViewTaskModel $viewTaskModel)
    {
        $this->viewTaskModel = $viewTaskModel;
    }

    public function __invoke($request, $response, array $args)
    {
        $id = $args['id'];
        $this->viewTaskModel->markAsDeleted($id);

        return $response->withHeader('Location', '/todo');
    }
}