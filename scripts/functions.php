<?php

function i($code) {
    # Retorna FOntawesome Icon
    $icon = '<i class="fa fa-' . $code . '" aria-hidden="true"></i>';
    return $icon;
}

function dateNice($date) {
    return date('M j Y g:i A', $date);
}

function time_nice($seconds) {
    $h = floor(($seconds / 60) / 60);
    $m = round(($seconds / 60) - ($h * 60));
    return $h . 'hrs : ' . $m . 'mins';
}

function save($data) {
    $json = json_encode($data);
    $file = fopen("data.json", "w") or die("Unable to open file!");
    fwrite($file, $json);
}

?>
