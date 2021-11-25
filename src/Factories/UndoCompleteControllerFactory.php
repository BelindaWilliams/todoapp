<?php


namespace App\Factories;

use App\Controllers\UndoCompleteController;

class UndoCompleteControllerFactory
{
    public function __invoke($container): UndoCompleteController
    {
        $viewTaskModel = $container->get('ViewTaskModel');
        return new UndoCompleteController($viewTaskModel);
    }
}