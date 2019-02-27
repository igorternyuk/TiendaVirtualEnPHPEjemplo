<?php
/**
 * Main page controller
 */

include_once '../models/CategoryModel.php';
include_once '../models/ProductModel.php';

function indexAction($smarty){
    $rsCategories = getAllMainCategoriesWithChildren();
    $rsProducts = getLastProducts(16);
    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('allCats', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    //debug($allCats);
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
