<?php

session_start(); //starts the session

//If the shopping cart is not set we'll initialize it with an empty array
if(!isset($_SESSION['cart'])){  
    $_SESSION['cart'] = array();
}

include_once '../config/config.php';          //Settings initialization
include_once '../config/db.php';          //Connection to the database
include_once '../library/mainFunctions.php';  //Include the file with funcitons which are common for all web site

$controllerNameFromGet = filter_input(INPUT_GET, 'controller');

//Determine controller to handle request
$controllerName = isset($controllerNameFromGet)
        ? ucfirst($controllerNameFromGet)
        : 'Index';

//$actionNameFromGet = filter_input(INPUT_GET, 'action');

//Determine the action to work with
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

$smarty->assign('cartItemCount', count($_SESSION['cart']));
//Loading corresponding web page
loadPage($smarty, $controllerName, $actionName);
