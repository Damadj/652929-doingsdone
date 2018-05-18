<?php

require_once ('functions.php');

$con = mysqli_connect('127.0.0.1', 'root', '', 'doingsdone');
if ($con == false) {
    print('Ошибка подключения: ' . mysqli_connect_error());
}
else {
    $user_id = 2;
    $project_id = 3;
    $categories = projects_list_for_user($con, $user_id);
    $tasks = tasks_list_for_project($con, $project_id);
}



$main_content = include_template('templates/index.php', ['tasks' => $tasks]);
$layout_content = include_template('templates/layout.php', ['categories' => $categories,
    'title' => 'Дела в порядке', 'content' => $main_content, 'tasks' => $tasks]);

print($layout_content);

