<?php
/**
 * Main page controller
 */

include_once '../models/CategoryModel.php';
include_once '../models/ProductModel.php';

function indexAction($smarty){
    $rsCategories = getAllMainCategoriesWithChildren();
    
    //pagination
    $paginator = [];
    $paginator['perPage'] = 6;
    $pageFromGet = filter_input(INPUT_GET, 'page');
    $paginator['currentPage'] = isset($pageFromGet) ? $pageFromGet : 1;
    $paginator['offset'] = ( $paginator['currentPage'] - 1 ) * $paginator['perPage'];
    
    $smarty->assign('currentLetter', '#');
    $letterFromGet = filter_input(INPUT_GET, 'letter');
    if(isset($letterFromGet)){
        $_SESSION['letter'] = $letterFromGet;
        if($_SESSION['letter'] == "#"){
            unset($_SESSION['letter']);            
        } else {
            $smarty->assign('currentLetter', $letterFromGet);
        }
    }
    
    if(isset($_SESSION['letter'])){
        $paginator['link'] = "/index/?letter={$_SESSION['letter']}&page=";
        $paginator['productTotal'] = countAllAvailableProucts($_SESSION['letter']);
        $rsProducts = getLastProducts($paginator['perPage'], $paginator['offset'], $_SESSION['letter']);
    } else {
        $paginator['link'] = "/index/?page=";
        $paginator['productTotal'] = countAllAvailableProucts();
        $rsProducts = getLastProducts($paginator['perPage'], $paginator['offset']);
    }
    
    
    $paginator['pageCount'] = ceil($paginator['productTotal'] / $paginator['perPage']);
    
    //debug2($rsProducts);
    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('allCats', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('paginator', $paginator);
    $smarty->assign('latinLetters', range('A', 'Z'));
    $smarty->assign('cyrillicLetters', gellCyrillicLetters());
    
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
