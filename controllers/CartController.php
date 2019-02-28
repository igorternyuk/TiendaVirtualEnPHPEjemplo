<?php

/* 
 * Cart controller
 */


include_once '../models/CategoryModel.php';
include_once '../models/ProductModel.php';

/**
 * Adds product to cart by id
 * @param integer id GET parameter - the id of product to add
 * @return the JSON representation of information about operation (success, cart item count)
 */

function addtocartAction(){
    $productId = filter_input(INPUT_GET, 'id');
    
    if(isset($_GET['id'])){
        $productId = intval($_GET['id']);
    } else {
        return false;
    }
  
    $resData = array();
    
    if(isset($_SESSION['cart']) and array_search($productId, $_SESSION['cart']) === false){
        array_push($_SESSION['cart'], $productId);
        $resData['itemCount'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }
    
    echo json_encode($resData);
}

/**
 * Removes product from cart by id
 * @param integer id GET parameter - the id of product to remove
 * @return the JSON representation of information about operation (success, cart item count)
 */
function removefromcartAction(){
    if(isset($_GET['id'])){
        $productId = intval($_GET['id']);
    } else {
        exit();
    }
    
    $resData = array();
    $key = array_search($productId, $_SESSION['cart']);
    if($key !== false){
        unset($_SESSION['cart'][$key]);
        $resData['itemCount'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }
    
    echo json_encode($resData);
}

/**
 * Generates cart page
 * @link /cart/
 * @param smarty object $smarty template engine instance
 */
function indexAction($smarty){
    $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    
    $allCategories = getAllMainCategoriesWithChildren();
    $productsInCart = getProductsByIds($cartItems);
    
    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('allCats', $allCategories);
    $smarty->assign('productsInCart', $productsInCart);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}


