<?php

namespace App\ViewHelpers;

use App\Entities\Task;

class ViewTaskViewHelper
{
    public static function displayTask(Task $task): string
    {
        $htmlStr = '<p>' . $task->getTask() . '</p>';
        return $htmlStr;
    }
}