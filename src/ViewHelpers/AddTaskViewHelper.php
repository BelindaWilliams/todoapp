<?php

namespace App\ViewHelpers;

class AddTaskViewHelper
{
    public static function displayAddTaskForm(): string
    {
        $htmlStr = '<form action="todo" method="post">';
        $htmlStr .= '<div class="input-group mb-3">';
        $htmlStr .= '<input class="form-control" type="text" name="task" id="task" placeholder="Add new task">';
        $htmlStr .= '<button class="btn btn-outline-secondary add-btn" type="submit">Add</button>';
        $htmlStr .= '</div>';
        $htmlStr .= '</form>';
        return $htmlStr;
    }
}