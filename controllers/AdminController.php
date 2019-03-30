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
    $allProducts = getAllProducts();
    
    $smarty->assign('pageTitle', "Управление категориями");
    $smarty->assign('allSubCats', $allSubCats);
    $smarty->assign('allProducts', $allProducts);
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

function uploadFile($localFileName, $localPath = "/upload/", $isImage = FALSE){
    $size = $_FILES['filename']['size'];
    if($size > MaxImageFileSize){
        echo "Файл слишком большой.";
        return false;
    }
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
    $pathInfo = pathinfo($localFileName);
    
    if($isImage){
        $check = getimagesize($_FILES['filename']['tmp_name']);
        
        if(!$check){
            echo "Файл не является изображением";
            return FALSE;
        }
        
        if(!in_array($ext, ImageExtensions)){
            echo "Неизвестный формат изображения";
            return FALSE;
        }
        $newFileName = $pathInfo['filename'] . "." . $ext;
        
    } else {
        if($ext != $pathInfo['extension']){
            return false;
        }
        $newFileName = $pathInfo['filename'] . "_" . time() . "." . $ext;
    }
    
    $fullPath = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . $localPath;
    
    if(!file_exists($fullPath)){
        mkdir($fullPath);
    }
    
    if(is_uploaded_file($_FILES['filename']['tmp_name'])){
        $fullPath .= $newFileName;        
        $success = move_uploaded_file($_FILES['filename']['tmp_name'],
                $fullPath);
        $response = $success == TRUE ? $newFileName : FALSE;
        return $response;
    }
    return FALSE;
}

function uploadAction(){
    $productId = intval(filter_input(INPUT_POST, 'productId'));
    $imgLocalPath = "/images/product/";
    $uploadedImageName = uploadFile($productId, $imgLocalPath, TRUE);
    if($uploadedImageName){
        if(updateProductImage($productId, $uploadedImageName)){
            redirect("/admin/product/");
        }  
    } else {
        echo "Ошибка загрузки изображения товара";
        return FALSE;
    }    
}

function orderAction($smarty){
    $orders = getOrders();
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

function importfromxmlAction(){
    $xmlLocalPath = "/xml/import/";
    $uploadedFileName = uploadFile("products_import.xml", $xmlLocalPath);
    //debug2($uploadedFileName);
    if(!$uploadedFileName){
        echo "Ошибка загрузки xml файла";
        return FALSE;
    }
    $xmlFile = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . $xmlLocalPath . $uploadedFileName;
    //debug2($xmlFile);
    $xmlProducts = simplexml_load_file($xmlFile);
    $i = 0;
    $products = [];
    foreach ($xmlProducts as $product){
        $products[$i]['name'] = htmlentities($product->name, ENT_QUOTES | ENT_IGNORE, 'utf-8');
        $products[$i]['category_id'] = intval($product->category_id);
        $products[$i]['price'] = floatval($product->price);
        $products[$i]['description'] = htmlentities($product->description, ENT_QUOTES | ENT_IGNORE, 'utf-8');
        $products[$i]['status'] = intval($product->status);
        ++$i;
    }
    
    $res = importProductsFromXML($products);
    if($res){
        redirect("/admin/product/");
    }
}
