<?php
//header('Content-Type: text/html; charset=utf-8');

function __autoload($class) {
    require __DIR__  . '/classes/' .  $class . '.php';
}

$ctrl = $_POST['ctrl'];
$action = $_POST['action'];
$ctrlClass = $ctrl . 'Controller';

$ctrl = new $ctrlClass;
$ctrl->action($action);
