<?php

namespace App\Factories;

use App\Controllers\ViewIncompleteTaskController;
use Psr\Container\ContainerInterface;

class ViewIncompleteTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): ViewIncompleteTaskController
    {
        $renderer = $container->get('renderer');
        $viewTaskModel = $container->get('ViewTaskModel');
        return new ViewIncompleteTaskController($renderer, $viewTaskModel);
    }
}