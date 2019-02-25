<?php
/**
 * Main page controller
 */

/**
 * 
 * @param type $smarty template engine instance
 */

include_once '../models/CategoryModel.php';

function indexAction($smarty){
    $allCats = getAllMainCategoriesWithChildren();
    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('allCats', $allCats);
    //debug($allCats);
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
