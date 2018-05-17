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
?>