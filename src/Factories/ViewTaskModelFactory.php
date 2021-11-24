<?php


namespace App\Factories;

use App\Models\ViewTaskModel;
use Psr\Container\ContainerInterface;

class ViewTaskModelFactory
{
    public function __invoke(ContainerInterface $container): ViewTaskModel
    {
        $db = $container->get('dbConnection');
        return new ViewTaskModel($db);
    }
}