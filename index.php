<?php

require_once ('functions.php');

$con = mysqli_connect('127.0.0.1', 'root', '', 'doingsdone');
if ($con == false) {
    print('Ошибка подключения: ' . mysqli_connect_error());
}
else {
    $user_id = 2;
    $project_id = 3;
    $categories = sql_array($con, "SELECT c.id, project, user_name FROM categories c JOIN users u ON c.user_id = u.id WHERE c.user_id = $user_id;");
    $tasks = sql_array($con, "SELECT t.id, task_name, project, time_limit, completion_date FROM tasks t JOIN categories c ON t.project_id = c.id WHERE t.project_id = $project_id AND completion_date IS NULL;");
}



$main_content = include_template('templates/index.php', ['tasks' => $tasks]);
$layout_content = include_template('templates/layout.php', ['categories' => $categories,
    'title' => 'Дела в порядке', 'content' => $main_content, 'tasks' => $tasks]);

print($layout_content);

