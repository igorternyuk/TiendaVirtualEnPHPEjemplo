<?php
include_once '../config/config.php';          //Settings initialization
include_once '../library/mainFunctions.php';  //Include the file with funcitons which are common for all web site

$controllerNameFromGet = filter_input(INPUT_GET, 'controller');

//Determine controller to handle request
$controllerName = isset($controllerNameFromGet)
        ? ucfirst($controllerNameFromGet)
        : 'Index';

$actionNameFromGet = filter_input(INPUT_GET, 'action');

//Determine the action to work with
$actionName = isset($actionNameFromGet) ? $actionNameFromGet : 'index';

//Loading corresponding web page
loadPage($smarty, $controllerName, $actionName);
