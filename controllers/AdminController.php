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
    $status = filter_input(INPUT_POST, 'description');
    $image = filter_input(INPUT_POST, 'status');
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
    
}
