<?php

/* 
 * Product controller
 */

include_once '../models/CategoryModel.php';
include_once '../models/ProductModel.php';

function indexAction($smarty){
    $productID = filter_input(INPUT_GET, 'id');
    
    if(!isset($productID)){
        $productID = null;
    }
    
    $selectedProduct = getProductById($productID);
    $selectedProduct['name'] = html_entity_decode($selectedProduct['name']);
    $selectedProduct['description'] = html_entity_decode($selectedProduct['description']);
    
    $allCategories = getAllMainCategoriesWithChildren();
    
    $smarty->assign('pageTitle', $selectedProduct['name']);
    $smarty->assign('allCats', $allCategories);
    $smarty->assign('selectedProduct', $selectedProduct);
    
    $smarty->assign('itemInCart', 0);
    if(in_array($productID, $_SESSION['cart'])){
        $smarty->assign('itemInCart', 1);
    }
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}