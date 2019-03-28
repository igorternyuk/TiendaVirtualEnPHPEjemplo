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
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}

function searchAction($smarty){
    $searchFilter = filter_input(INPUT_POST, 'searchFilter');
    $sorter = filter_input(INPUT_POST, 'productSorter');
    $searchResults = getProductsByName($searchFilter, $sorter);
    $smarty->assign('rsProducts', $searchResults);
    $resultPage = fetchTemplate($smarty, 'galery');
    $resData = [];
    $resData['resultPage'] = $resultPage;
    if(count($searchResults) > 0){        
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }
    
    //loadTemplate($smarty, 'index');
    echo json_encode($resData);
}
