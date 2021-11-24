<?php


namespace App\Factories;

use App\Controllers\DeleteTaskController;

class DeleteTaskControllerFactory
{
    public function __invoke($container): DeleteTaskController
    {
        $viewTaskModel = $container->get('ViewTaskModel');
        return new DeleteTaskController($viewTaskModel);
    }
}