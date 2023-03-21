<?php

function pre_dump($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function post_debug($data)
{
    $timestamp = date("Y-m-d H:i:s");
    $log = $timestamp . " - " . print_r($data, true) . "\n";
    error_log($log, 3, "debug.log");
}
