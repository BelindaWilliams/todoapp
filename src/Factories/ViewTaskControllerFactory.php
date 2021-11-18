<?php


namespace App\Factories;

use App\Controllers\ViewTaskController;
use Psr\Container\ContainerInterface;

class ViewTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): ViewTaskController
    {
        $renderer = $container->get('renderer');
        $viewTaskModel = $container->get('ViewTaskModel');
        return new ViewTaskController($renderer, $viewTaskModel);
    }
}