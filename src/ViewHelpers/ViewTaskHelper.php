<?php

namespace App\ViewHelpers;

use App\Entities\Task;

class ViewTaskHelper
{
    public static function displayTasks(array $tasks): string
    {
        $htmlStr = '';
        foreach ($tasks as $task) {
            $htmlStr .= '<tr class="table-light">';
            $htmlStr .= '<td>' . $task->getTask() . '</td>';
            $htmlStr .= '<td>';
            $htmlStr .= '<td><form method="post" action="markComplete/' . $task->getId() . '">';
            $htmlStr .= '<input type="submit" value ="Complete" class="btn btn-primary"></td>';
            $htmlStr .= '</form>';
            $htmlStr .= '<td><form method="post" action="deleteTask/' . $task->getId() . '">';
            $htmlStr .= '<input type="submit" value ="Delete" class="btn btn-primary"></td>';
            $htmlStr .= '</form>';
            $htmlStr .= '</tr>';
        }
        return $htmlStr;
    }
}