<?php

namespace App\ViewHelpers;

class AddTaskViewHelper
{
    public static function displayAddTaskForm(): string
    {
        $htmlStr = '<form action="todo" method="post">';
        $htmlStr .= '<div class="form-group">';
        $htmlStr .= '<input class="form-control" type="text" name="task" id="task" placeholder="Add new task">';
        $htmlStr .= '</div>';
        $htmlStr .= '<button type="submit" class="btn btn-primary">Add</button>';
        $htmlStr .= '</form>';
        return $htmlStr;
    }
}