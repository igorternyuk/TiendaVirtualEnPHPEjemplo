<?php

include_once '../models/CategoryModel.php';
include_once '../models/ProductModel.php';
include_once '../models/OrderModel.php';
include_once '../models/PurchaseModel.php';

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);

function indexAction($smarty){
    
    $allMainCats = getAllMainCategories();
    $allCats = getAllCategories();
    
    $smarty->assign('pageTitle', "Управление сайтом");
    $smarty->assign('allMainCats', $allMainCats);
    $smarty->assign('allCats', $allCats);
    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'admin');
    loadTemplate($smarty, 'adminFooter');
}

function categoryAction($smarty){
    $allMainCats = getAllMainCategories();
    $allCats = getAllCategories();
    
    $smarty->assign('pageTitle', "Управление категориями");
    $smarty->assign('allMainCats', $allMainCats);
    $smarty->assign('allCats', $allCats);
    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminCategory');
    loadTemplate($smarty, 'adminFooter');
}


function addnewcatAction(){
    $categoryName = filter_input(INPUT_POST, 'newCategoryName');
    $categoryParentId = filter_input(INPUT_POST, 'categoryParentId');
    $newCategoryId = createNewCategory($categoryName, $categoryParentId);
    $res = [];
    if($newCategoryId){
        $res['success'] = 1;
        $res['message'] = "Новая категория {$categoryName} была успешно создана";
    } else {
        $res['success'] = 0;
        $res['message'] = "Ошибка при создании новой категории";
    }
    echo json_encode($res);
    return;
}

function updatecatAction(){
    $categoryId = filter_input(INPUT_POST, 'categoryId');
    $categoryNewName = filter_input(INPUT_POST, 'newCategoryName');
    $parentCategoryNewId = filter_input(INPUT_POST, 'parentCategoryNewId');
    $res = [];
    if(updateCategory($categoryId, $categoryNewName, $parentCategoryNewId)){
        $res['success'] = 1;
        $res['message'] = "Категория успешно обновлена";
    } else {
        $res['success'] = 0;
        $res['message'] = "Ошибка обновления категории";
    }
    echo json_encode($res);
    return;
}

function productAction($smarty){
    $allSubCats = getAllSubCategories();
    $allAvailableProducts = getAllAvailableProducts();
    
    $smarty->assign('pageTitle', "Управление категориями");
    $smarty->assign('allSubCats', $allSubCats);
    $smarty->assign('allProducts', $allAvailableProducts);
    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminProduct');
    loadTemplate($smarty, 'adminFooter');
}

function addnewproductAction(){
    $name = filter_input(INPUT_POST, 'newProductName');
    $categoryId = filter_input(INPUT_POST, 'newProductCategoryId');
    $price = filter_input(INPUT_POST, 'newProductPrice');
    $description = filter_input(INPUT_POST, 'newProductDescription');
    $res = [];
    if(createNewProduct($name, $categoryId, $price, $description)){
        $res['success'] = 1;
        $res['message'] = "Новый товар успешно создан";
    } else {
        $res['success'] = 0;
        $res['message'] = "Ошибка создания товара";
    }
    echo json_encode($res);
    return;
}

function updateproductAction(){
    $productId = filter_input(INPUT_POST, 'productId');
    $name = filter_input(INPUT_POST, 'name');
    $categoryId = filter_input(INPUT_POST, 'categoryId');
    $price = filter_input(INPUT_POST, 'price');
    $description = filter_input(INPUT_POST, 'description');
    $status = filter_input(INPUT_POST, 'status');
    $image = filter_input(INPUT_POST, 'image');
    $res = [];
    if(updateProduct($productId, $name, $categoryId, $price, $description,
           $status, $image)){
        $res['success'] = 1;
        $res['message'] = "Товар успешно обновлен";
    } else {
        $res['success'] = 0;
        $res['message'] = "Ошибка обновления товара";
    }
    echo json_encode($res);
    return;
}

function uploadAction(){
    $productId = filter_input(INPUT_POST, 'productId');
    $size = $_FILES['imageFile']['size'];
    //echo "<br/>File size: ".$size;
    if($size > MaxImageFileSize){
        echo "Файл слишком большой.";
        return;
    }
    
    $tmp = $_FILES['imageFile']['tmp_name'];
    //$type = $_FILES['imageFile']['type'];
    
    $check = getimagesize($tmp);
    if(!$check){
        echo "Файл не является изображением";
        return;
    }
    
    $name = $_FILES['imageFile']['name'];
    //echo "<br/>File name: ".$name;
    $ext = pathinfo($name, PATHINFO_EXTENSION);
   // echo "<br/>File extension: ".$ext;
    if(!in_array($ext, ImageExtensions)){
        echo "Неизвестный формат изображения";
        return;
    }
    
    //echo "<br/>File type: ".$type;
    $newFileName = $productId.".".$ext;
    //echo "Новое имя файла: ".$newFileName;
    if(is_uploaded_file($tmp)){
       // echo "File was uploaded";
       $serverRoot = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
       $res = move_uploaded_file($tmp, $serverRoot."/images/product/".$newFileName);
        if($res){
           // echo "Updating product image";
            $res = updateProductImage($productId, $newFileName);
            if($res){
                //return $newFileName;
                redirect("/admin/product/");
            }           
        }
    } else {
        echo "Ошибка загрузки файла";
    }
}

function orderAction($smarty){
    $orders = getOrders();
    //debug($orders);
    $smarty->assign('pageTitle', "Управление заказами");
    $smarty->assign('orders', $orders);
    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminOrder');
    loadTemplate($smarty, 'adminFooter');
}

function updateorderstatusAction(){
    $orderId = filter_input(INPUT_POST, 'orderId');
    $orderStatus = filter_input(INPUT_POST, 'orderStatus');
    $res = [];
    if(updateOrderStatus($orderId, $orderStatus)){
        $res['success'] = 1;
        $res['message'] = "Статус заказа успешно обновлен";
    } else {
        $res['success'] = 0;
        $res['message'] = "Ошибка обновления статуса заказа"; 
    }
    echo json_encode($res);
    return;
}

function updateorderpaymentdateAction(){
    $orderId = filter_input(INPUT_POST, 'orderId');
    $orderPaymentDate = filter_input(INPUT_POST, 'orderPaymentDate');
    $res = [];
    if(updateOrderModificationDate($orderId, $orderPaymentDate)){
        $res['success'] = 1;
        $res['message'] = "Дата оплаты заказа успешно обновлена";
    } else {
        $res['success'] = 0;
        $res['message'] = "Ошибка обновления даты оплаты заказа"; 
    }
    echo json_encode($res);
    return;
}

function createxmlAction(){
    $rsProducts = getAllProducts();
    $xml = new DOMDocument('1.0', 'utf-8');
    $xmlProducts = $xml->appendChild($xml->createElement('products'));
    
    foreach($rsProducts as $product){
        $xmlProduct = $xmlProducts->appendChild($xml->createElement('product'));
        foreach($product as $key => $val){
            $xmlName = $xmlProduct->appendChild($xml->createElement($key));
            $xmlName->appendChild($xml->createTextNode($val));
        }
    }
    
    //debug2($xml);
    $xml->save(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . "/xml/products.xml");
    echo "ok";
}
