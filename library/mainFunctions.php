<?php

include_once '../config/db.php';

/**
 * Forms the requested web page
 * @param type $smarty instance of template engine
 * @param type $controllerName name of controller
 * @param type $actionName name of controller action
 */
function loadPage($smarty, $controllerName, $actionName = 'index'){
    include_once PathPrefix . $controllerName . PathPostfix;
    $function = $actionName . 'Action';
    //debug($smarty, TRUE);
    $function($smarty);
}

/**
 * Loads requested template
 * @param type $smarty instance of template engine
 * @param type $templateName the name of template to load
 */
function loadTemplate($smarty, $templateName){
   $smarty->display($templateName . TemplatePostfix); 
}

function debug($value = null, $die = TRUE){
    echo 'Debug <br> <pre>';
    print_r($value);
    echo '</pre>';
    if($die == TRUE){
        die;
    }
}

/**
 * Converts sql result set to associative array for smarty
 * @param resultSet $rs - sql result set
 * @return array
 */
function fetchSmartyArray($rs){
    $smartyRs = array();
    if($rs){
        while($row = $rs->fetch_assoc()){
            array_push($smartyRs, $row);
        }
    }
    return $smartyRs;
}

/**
 * Executes selection queries
 * @param string $query - select query
 * @return array selection results
 */
function executeSelection($query){
    $db = Database::getInstance();
    $connection = $db->getConnection();
    $rs = $connection->query($query);
    $smartyRs = fetchSmartyArray($rs);
    $db->closeConnection();
    return $smartyRs;
}

/**
 * Executes update sql statements such as INSERT, UPDATE or DELETE
 * @param string $sql - update query
 * @return true in the case of success and false otherwise
 */
function executeUpdate($sql){
    $db = Database::getInstance();
    $connection = $db->getConnection();
    $res = $connection->query($sql);
    $errorOccured = mysqli_error($connection);
    $db->closeConnection();
    return $errorOccured ? false : true;
}


function redirect($url = '/'){
    header("Location: {$url}");
    exit;
}