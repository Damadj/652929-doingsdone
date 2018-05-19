<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

require_once ('functions.php');

$con = mysqli_connect('127.0.0.1', 'root', '', 'doingsdone');
if ($con == false) {
    print('Ошибка подключения: ' . mysqli_connect_error());
    die();
}
$user_id = 2;
$project_id = 3;
$categories = get_projects_list($con, $user_id);
$tasks = get_tasks_list($con, $project_id, $user_id, $show_complete_tasks);

$main_content = include_template('templates/index.php', ['tasks' => $tasks, 'show_complete_tasks' => $show_complete_tasks]);
$layout_content = include_template('templates/layout.php', ['categories' => $categories,
    'title' => 'Дела в порядке', 'content' => $main_content, 'tasks' => $tasks]);

print($layout_content);






