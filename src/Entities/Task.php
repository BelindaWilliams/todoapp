<?php

namespace App\Entities;

class Task
{
    private int $id;
    private string $task;
    private int $status_code;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTask(): string
    {
        return $this->task;
    }

    public function getStatusCode(): int
    {
        return $this->status_code;
    }
}