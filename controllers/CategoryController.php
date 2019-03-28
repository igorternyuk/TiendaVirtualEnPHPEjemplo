<?php

/* 
 * Contoller of category page
 */

include_once '../models/CategoryModel.php';
include_once '../models/ProductModel.php';

function indexAction($smarty){
    $categoryId = filter_input(INPUT_GET, 'id');
    
    if(!isset($categoryId)){
        $categoryId = null;
    }
    
    $selectedCategory = getCategoryById($categoryId);
    $allCategories = getAllMainCategoriesWithChildren();
    $rsChildren = null;
    $rsProducts = null;
    
    if($selectedCategory['parent_id'] == 0){
        $rsChildren = getCategoryChildren($categoryId);
        $smarty->assign('pageTitle', $selectedCategory['name']);
    } else {
        $rsProducts = getAllAvailableProductsByCategoryId($categoryId);
        $smarty->assign('pageTitle', "Товары ".$selectedCategory['name']);
    }

    $smarty->assign('selectedCategory', $selectedCategory);
    $smarty->assign('allCats', $allCategories);
    $smarty->assign('rsChildren', $rsChildren);
    $smarty->assign('rsProducts', $rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}
