<?php

namespace App\ViewHelpers;

use App\Entities\Task;

class ViewTaskHelper
{
    public static function displayIncompleteTasks(array $incompleteTasks): string
    {
        $htmlStr = '';
        foreach ($incompleteTasks as $task) {
            $htmlStr .= '<tr class="table-light">';
            $htmlStr .= '<td>' . $task->getTask() . '</td>';
            $htmlStr .= '<td>';
            $htmlStr .= '<td><form method="post" action="markComplete/' . $task->getId() . '">';
            $htmlStr .= '<input type="submit" value ="Complete" class="btn custom-btn"></td>';
            $htmlStr .= '</form>';
            $htmlStr .= '<td><form method="post" action="deleteTask/' . $task->getId() . '">';
            $htmlStr .= '<input type="submit" value ="Delete" class="btn custom-btn"></td>';
            $htmlStr .= '</form>';
            $htmlStr .= '</tr>';
        }
        return $htmlStr;
    }

    public static function displayCompletedTasks(array $completedTasks): string
    {
        $htmlStr = '';
        foreach ($completedTasks as $task) {
            $htmlStr .= '<tr class="table-light">';
            $htmlStr .= '<td><span class="completed-tasks">' . $task->getTask() . '</span></td>';
            $htmlStr .= '<td>';
            $htmlStr .= '<td><form method="post" action="undoComplete/' . $task->getId() . '">';
            $htmlStr .= '<input type="submit" value ="Undo" class="btn custom-btn"></td>';
            $htmlStr .= '</form>';
            $htmlStr .= '<td><form method="post" action="deleteTask/' . $task->getId() . '">';
            $htmlStr .= '<input type="submit" value ="Delete" class="btn custom-btn"></td>';
            $htmlStr .= '</form>';
            $htmlStr .= '</tr>';
        }
        return $htmlStr;
    }
}