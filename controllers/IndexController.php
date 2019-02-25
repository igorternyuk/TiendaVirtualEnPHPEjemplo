<?php
/**
 * Main page controller
 */

/**
 * 
 * @param type $smarty template engine instance
 */

function indexAction($smarty){
    $smarty->assign('pageTitle', 'Главная страница сайта');
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
