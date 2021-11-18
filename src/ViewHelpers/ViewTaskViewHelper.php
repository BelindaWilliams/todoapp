<?php

namespace App\ViewHelpers;

use App\Entities\Task;

class ViewTaskViewHelper
{
    public static function displayTasks(array $tasks): string
    {
        $htmlStr = '';
        foreach ($tasks as $task) {
            $htmlStr .= '<p>' . $task->getTask() . '</p>';
        }
        return $htmlStr;
    }
}