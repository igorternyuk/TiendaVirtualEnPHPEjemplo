<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../models/CategoryModel.php';
include_once '../models/ProductModel.php';
include_once '../models/OrderModel.php';
include_once '../models/PurchaseModel.php';

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);

function indexAction($smarty){
    
    $allMainCats = getAllMainCategories();
    
    $smarty->assign('pageTitle', "Управление сайтом");
    $smarty->assign('allMainCats', $allMainCats);
    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'admin');
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
