<?php

namespace App\Models;

use App\Entities\Task;
use PDO;

class ViewTaskModel
{
    private PDO $dbConnection;

    public function __construct(PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

//    public function get(int $id): Task
//    {
//        $sql = 'SELECT '
//            . '`id`, `task`, `status_code`'
//            . 'FROM '
//            . '`tasks` '
//            . 'WHERE `id`=:id;';
//        $query = $this->dbConnection->prepare($sql);
//        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
//        $query->execute(['id' => $id]);
//        return $query->fetch();
//    }

    public function getAll(): array
    {
        $sql = 'SELECT '
            . '`id`, `task`, `status_code`'
            . 'FROM '
            . '`tasks`;';
        $query = $this->dbConnection->prepare($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $query->execute();
        return $query->fetchAll();
    }
}