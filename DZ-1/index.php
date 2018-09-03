<?php
header("Content-Type: text/html; charset=utf8");
include __DIR__ . "/config/main.php";

if ($_GET['do']){
    $name = strip_tags($_GET['do']);

    if (file_exists(ENGINE_DIR.$name.'.php')) {
        $class_name = $name;
    } else {
        $class_name = 'main';
    }
} else {
    $class_name = 'main';
}

function __autoload($class_name){
    require_once (ENGINE_DIR.$class_name.'.php');
}

$obj = new $class_name;
$res_arr = $obj->get_body();

require TEMPLATES_DIR.'index.php';