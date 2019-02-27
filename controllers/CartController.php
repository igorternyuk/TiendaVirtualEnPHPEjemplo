<?php

/* 
 * Cart controller
 */


include_once '../models/CategoryModel.php';
include_once '../models/ProductModel.php';

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

