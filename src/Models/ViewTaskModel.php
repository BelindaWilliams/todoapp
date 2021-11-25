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

    public function get(int $id): Task
    {
        $sql = 'SELECT '
            . '`id`, `task`, `completed`, `deleted`'
            . 'FROM '
            . '`tasks` '
            . 'WHERE `id`=:id;';
        $query = $this->dbConnection->prepare($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function getAll(): array
    {
        $sql = 'SELECT '
            . '`id`, `task`, `completed`, `deleted` '
            . 'FROM '
            . '`tasks`;';
        $query = $this->dbConnection->prepare($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function getIncompleteTasks(): array
    {
        $sql = 'SELECT '
            . '`id`, `task` '
            . 'FROM '
            . '`tasks` '
            . 'WHERE '
            . '`completed` = 0 AND `deleted` = 0';
        $query = $this->dbConnection->prepare($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function getCompletedTasks(): array
    {
        $sql = 'SELECT '
            . '`id`, `task` '
            . 'FROM '
            . '`tasks` '
            . 'WHERE '
            . '`completed` = 1 AND `deleted` = 0';
        $query = $this->dbConnection->prepare($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function markAsCompleted(int $id): void
    {
        $sql = 'UPDATE '
            . '`tasks` '
            . 'SET '
            . '`completed` = 1 '
            . 'WHERE `id` = ?';
        $query = $this->dbConnection->prepare($sql);
        $query->execute([$id]);
    }

    public function undoComplete(int $id): void
    {
        $sql = 'UPDATE '
            . '`tasks` '
            . 'SET '
            . '`completed` = 0 '
            . 'WHERE `id` = ?';
        $query = $this->dbConnection->prepare($sql);
        $query->execute([$id]);
    }

    public function markAsDeleted(int $id): void
    {
        $sql = 'UPDATE '
            . '`tasks` '
            . 'SET '
            . '`deleted` = 1 '
            . 'WHERE `id` = ?';
        $query = $this->dbConnection->prepare($sql);
        $query->execute([$id]);
    }
}