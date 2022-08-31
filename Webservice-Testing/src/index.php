<?php

spl_autoload_register(function ($classname) {
    $filename = $classname . ".php";

    if (file_exists($filename)) {
        include_once($filename);
    }
});

$action = isset($_GET['action']) ? $_GET['action'] : null;
$param = isset($_GET['param']) ? $_GET['param'] : null;

/*
switch ($action) {
    case 'rotate':
        echo strrev($param);
        break;
    case 'length':
        echo strlen($param);
        break;
    default:
        echo 'method not found';

}
*/

$ws = new WebService();
echo $ws->$action($param);