<?php

namespace App\Factories;

use App\Controllers\MarkCompleteController;

class MarkCompleteControllerFactory
{
    public function __invoke($container): MarkCompleteController
    {
        $viewTaskModel = $container->get('ViewTaskModel');
        return new MarkCompleteController($viewTaskModel);
    }
}