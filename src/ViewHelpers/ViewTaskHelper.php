<?php

namespace App\ViewHelpers;

use App\Entities\Task;

class ViewTaskHelper
{
    public static function displayTasks(array $tasks): string
    {
        $htmlStr = '';
        foreach ($tasks as $task) {
            $htmlStr .= '<tr>';
            $htmlStr .= '<td>' . $task->getTask() . '</td>';
            $htmlStr .= '<td><form method="post" action="markComplete/' . $task->getId() . '">';
            $htmlStr .= '<input type="submit" value ="Completed"></td>';
            $htmlStr .= '</form>';
            $htmlStr .= '<td><form method="post" action="deleteTask/' . $task->getId() . '">';
            $htmlStr .= '<input type="submit" value ="Delete"></td>';
            $htmlStr .= '</form>';
            $htmlStr .= '</tr>';
        }
        return $htmlStr;
    }
}