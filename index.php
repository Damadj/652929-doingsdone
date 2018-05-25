<?php
require_once ('functions.php');

$con = mysqli_connect('127.0.0.1', 'root', '', 'doingsdone');
if ($con == false) {
    print('Ошибка подключения: ' . mysqli_connect_error());
    die();
}
$show_complete_tasks = rand(0, 1);
$user_id = 2;
if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];
    $check_project = mysqli_query($con, "SELECT id FROM categories WHERE id = $project_id");
    if($check_project->num_rows == 0 && $project_id != '') {
        http_response_code(404);
        die();
    }
}
else {
    $project_id = '';
}

$categories = get_projects_list($con, $user_id);
$tasks = get_tasks_list($con, $project_id, $user_id, $show_complete_tasks);

$main_content = include_template('templates/index.php', ['tasks' => $tasks, 'show_complete_tasks' => $show_complete_tasks]);
$layout_content = include_template('templates/layout.php', ['project_id' => $project_id, 'categories' => $categories,
    'title' => 'Дела в порядке', 'content' => $main_content, 'tasks' => $tasks, 'show_complete_tasks' => $show_complete_tasks]);

print($layout_content);




