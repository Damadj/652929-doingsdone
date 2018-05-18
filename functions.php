<?php
function include_template($path, $data) {
    if (file_exists($path)) {
        ob_start();
        extract($data);
        require_once($path);
        $result = ob_get_clean();
    }
    else {
        $result = "";
    }
    return $result;
}


function project_count($array, $name) {
    $amount = 0;
    if ($name == 'Все') {
        $amount = count($array);
    }
    else {
        foreach ($array as $value) {
            if ($value['project'] == $name) {
                $amount++;
            }
        }
    }
    return $amount;
}


function time_alert($end_date, $completed) {
    $important = "";
    $last_date = floor((strtotime(htmlspecialchars($end_date)) - time()) / 3600);
    if ($last_date <= 24 && $end_date != false && $completed != true) {
        $important = ('task--important');
    }
    return $important;
}


function projects_list_for_user($connect, $user_id) {
    $sql = "SELECT c.id, project, user_name FROM categories c JOIN users u ON c.user_id = u.id WHERE c.user_id = $user_id;";
    $query = mysqli_query($connect, $sql);
    $array = mysqli_fetch_all($query, MYSQLI_ASSOC);

    return $array;
}

function tasks_list_for_project($connect, $project_id) {
    $sql = "SELECT t.id, task_name, project, time_limit, completion_date FROM tasks t JOIN categories c ON t.project_id = c.id WHERE t.project_id = $project_id AND completion_date IS NULL;";
    $query = mysqli_query($connect, $sql);
    $array = mysqli_fetch_all($query, MYSQLI_ASSOC);

    return $array;
}
?>