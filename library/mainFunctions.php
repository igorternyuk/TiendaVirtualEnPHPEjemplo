<?php

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
