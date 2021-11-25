<?php


namespace App\Controllers;


use App\Models\ViewTaskModel;

class UndoCompleteController
{
    private ViewTaskModel $viewTaskModel;

    public function __construct($viewTaskModel)
    {
        $this->viewTaskModel = $viewTaskModel;
    }

    public function __invoke($request, $response, array $args)
    {
        $id = $args['id'];
        $this->viewTaskModel->undoComplete($id);
        return $response->withHeader('Location', '/todo');
    }
}