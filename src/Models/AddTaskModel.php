<?php

namespace App\Models;

use PDO;

class AddTaskModel
{
    private PDO $dbConnection;

    public function __construct(PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function addNewTask(array $newTask): bool
    {
        $sql = 'INSERT INTO `tasks` (`task`)'
            . ' VALUES (:task)';
        $query = $this->dbConnection->prepare($sql);
        return $query->execute(['task'=>$newTask['task']]);
    }
}