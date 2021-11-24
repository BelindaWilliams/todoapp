<?php

namespace App\Factories;

use App\Controllers\ViewCompleteTaskController;
use Psr\Container\ContainerInterface;

class ViewCompleteTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): ViewCompleteTaskController
    {
        $renderer = $container->get('renderer');
        $viewTaskModel = $container->get('ViewTaskModel');
        return new ViewCompleteTaskController($renderer, $viewTaskModel);
    }
}