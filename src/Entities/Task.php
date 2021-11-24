<?php

namespace App\Entities;

class Task
{
    private int $id;
    private string $task;
    private int $completed;
    private int $deleted;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTask(): string
    {
        return $this->task;
    }

    public function getCompleted(): int
    {
        return $this->completed;
    }

    public function getDeleted(): int
    {
        return $this->deleted;
    }
}