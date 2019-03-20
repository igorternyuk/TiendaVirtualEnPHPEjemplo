<?php

/**
 * This is the model of product table
 */

include_once '../config/db.php';

/**
 * 
 * @param type $limit max amount of products to display
 * @return array array of products
 */
function getLastProducts($limit = null){
    
    $query = "SELECT * FROM product ORDER BY id DESC ";
    if($limit){
        $limit = intval($limit);
        $query .= "LIMIT {$limit}";
    }   
    
    $products = executeSelection($query);
    return $products;
}

/**
 * retrieves all products of given category
 * @param type $categoryId category id
 * @return array of products
 */
function getProductsByCategoryId($categoryId){
    $id = intval($categoryId);
    $query = "SELECT * FROM product WHERE category_id = '{$id}';";
    return executeSelection($query);
}

/**
 * retrieves product by id
 * @param type $id product id
 * @return product if exists and false otherwise
 */
function getProductById($id){
    $id = intval($id);
    $query = "SELECT * FROM product WHERE id = '{$id}';";
    $res = executeSelection($query);
    return count($res) > 0 ? $res[0] : false;
}

/**
 * retrieves array of products by id array
 * @param array $ids product identifiers
 * @return array products in cart
 */
function getProductsByIds($ids){
    foreach ($ids as &$id){
        $id = intval($id);
    }
    $ids = implode($ids, ", ");
    $query = "SELECT * FROM product WHERE id IN ({$ids});";
    return executeSelection($query);
    
}

/**
 * Fetches products by name
 * @param string $searchFilter product name filter
 * @param string $sortBy sorting criteria
 * @return array products witch match the filter
 */
function getProductsByName($searchFilter, $sortBy = "name"){
    filterSQLParams($searchFilter);
    $query = "SELECT * FROM `product` WHERE `name` LIKE '%{$searchFilter}%' ORDER BY {$sortBy}; ";
    return executeSelection($query);
}

function getProductsOfPurchase($orderId){
    $query = "SELECT * FROM purchase WHERE order_id = {$orderId};";
}
