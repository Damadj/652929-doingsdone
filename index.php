<?php


$con = mysqli_connect('127.0.0.1', 'root', '', 'doingsdone');
if ($con == false) {
    print('Ошибка подключения: ' . mysqli_connect_error());
}
else {
    $sql = "SELECT c.id, project, user_name FROM categories c JOIN users u ON c.user_id = u.id WHERE c.user_id = 2;";
    $sql2 = "SELECT t.id, task_name, project, time_limit, completion_date FROM tasks t JOIN categories c ON t.project_id = c.id WHERE t.project_id = 3;";

    $sql_categories = mysqli_query($con, $sql);
    $categories = mysqli_fetch_all($sql_categories, MYSQLI_ASSOC);
    $sql_tasks = mysqli_query($con, $sql2);
    $tasks = mysqli_fetch_all($sql_tasks, MYSQLI_ASSOC);
}

require_once ('functions.php');


$main_content = include_template('templates/index.php', ['tasks' => $tasks]);
$layout_content = include_template('templates/layout.php', ['categories' => $categories,
    'title' => 'Дела в порядке', 'content' => $main_content, 'tasks' => $tasks]);

print($layout_content);

