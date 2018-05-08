<?php
function include_template($path, $data) {
    if (file_exists($path)) {
        ob_start();
        extract($data);
        require_once($path);
        $result = ob_get_clean();
    }
    else {
        echo('path does not exist');
    }
    return $result;
}

function esc($str) {
    $text = htmlspecialchars($str);
    return $text;
}

function project_count($array, $name) {
    $amount = 0;
    if ($name == 'Все') {
        $amount = count($array);
    }
    else {
        foreach ($array as $value) {
            if ($value['categories'] == $name) {
                $amount++;
            }
        }
    }
    return $amount;
}

?>