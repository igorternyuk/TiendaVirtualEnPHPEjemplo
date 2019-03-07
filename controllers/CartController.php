<?php

/* 
 * Cart controller
 */


include_once '../models/CategoryModel.php';
include_once '../models/ProductModel.php';
include_once '../models/OrderModel.php';
include_once '../models/PurchaseModel.php';

/**
 * Adds product to cart by idDescriptionDescription
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


/**
 * AJAX function to prepare orders
 * @param smarty $smarty template engine instance 
 * @return type
 */
function orderAction($smarty){
    $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    
    if(!$cartItems){
        redirect("/cart/");
        return; 
    }
    
    /*
     * Calculate cart product counts
     */
    $productCounts = array();
    foreach ($cartItems as $productId) {
        $itemCounterId = "itemCount_".$productId;
        $count = filter_input(INPUT_POST, $itemCounterId);
        $productCounts[$productId] = $count;
    }
    
    /**
     * Calculate subtotals and total
     */
    $productsInCart = getProductsByIds($cartItems);
    $cartTotalSum = 0;
    for($i = 0; $i < count($productsInCart); ++$i){
        $product = $productsInCart[$i];
        $id = $productsInCart[$i]['id'];
        $count = isset($productCounts[$id]) ? $productCounts[$id] : 0;
        if($count > 0){
            $productsInCart[$i]['count'] = $count;
            $productsInCart[$i]['subtotal'] = $count * $product['price'];
            $cartTotalSum += $productsInCart[$i]['subtotal'];
        } else {
            unset($productsInCart[$i]);
        }
    }
    
    if(! $productsInCart){
        echo "Корзина пуста";
        return;
    }
    
    $_SESSION['saleCart'] = $productsInCart;
    $_SESSION['saleCartTotal'] = $cartTotalSum;
    
    $allCategories = getAllMainCategoriesWithChildren();
    
    $smarty->assign('pageTitle', "Ваш заказ");
    $smarty->assign('allCats', $allCategories);
    $smarty->assign('productsInCart', $productsInCart);
    $smarty->assign('cartTotalSum', $cartTotalSum);
    
    /**
     * hideLoginBox - flag to hide login box on the left column
     */
    if(!isset($_SESSION['user'])){
        $smarty->assign('hideLoginBox', 1);
    }
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
}

/**
 * AJAX function to save orders
 * @param array $_SESSION['saleCart'] array of purchased products
 * @return json Information about operation (success, message)
 */
function saveorderAction(){
    $cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
    $resData = array();
    if(! $cart){
        $resData['success'] = 0;
        $resData['message'] = "Корзина пуста";
        echo json_encode($resData);
        return;
    }
    
    $userName = filter_input(INPUT_POST, 'userName');
    $userPhone = filter_input(INPUT_POST, 'userPhone');
    $userAddress = filter_input(INPUT_POST, 'userAddress');
    
    $orderId = createNewOrder($userName, $userPhone, $userAddress);
    
    if(! $orderId){
        $resData['success'] = 0;
        $resData['message'] = "Ошибка создания заказа";
        echo json_encode($resData);
        return;
    }
    
    if(connectPurchasesToOrder($orderId, $cart)){
       $resData['success'] = 1;
       $resData['message'] = "Ваш заказ успешно сохранен.";
       unset($_SESSION['cart']);
       unset($_SESSION['saleCart']);
       unset($_SESSION['saleCartTotal']);
    } else {
       $resData['success'] = 0;
       $resData['message'] = "Ошибка сохранения заказа №".$orderId; 
    }
    
    echo json_encode($resData);    
}

