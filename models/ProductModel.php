<?php

/**
 * This is the model of product table
 */

include_once '../config/db.php';

function createNewProduct($name, $categoryId, $price, $description){
    filterSQLParams($name, $description);
    $categoryId = intval($categoryId);
    $price = floatval($price);
    $query = "INSERT INTO `product` (`name`, `category_id`, `price`, `description`)"
            . " VALUES('{$name}', '{$categoryId}', '{$price}', '{$description}');";
    //debug($query);
    return executeUpdate($query);
}

function updateProduct($productId, $name, $categoryId, $price, $description,
        $status, $image = null){
    $productId = intval($productId);
    filterSQLParams($name, $description, $image);
    $categoryId = intval($categoryId);
    $price = floatval($price);
    $set = [];
    if($name !== null){
        array_push($set, "`name` = '{$name}'");
    }
    
    if($categoryId !== null){
        array_push($set, "`category_id` = '{$categoryId}'");
    }
    
    if($price !== null){
        array_push($set, "`price` = '{$price}'");
    }
    
    if($description !== null){
        array_push($set, "`description` = '{$description}'");
    }
    
    if($status !== null){
        array_push($set, "`status` = '{$status}'");
    }
    
    if($image !== null){
        array_push($set, "`image` = '{$image}'");
    }
    
    $set = implode($set, ", ");
    $query = "UPDATE `product` SET {$set} WHERE `id` = {$productId} LIMIT 1;";
    debug($query);
    return executeUpdate($query);
}

function getAllProducts(){
    $query = "SELECT * FROM `product` ORDER BY `category_id` ASC;";
    return executeSelection($query);
}

function getAllAvailableProducts(){
    $query = "SELECT * FROM `product` WHERE `status` = 1 ORDER BY `category_id` ASC;";
    return executeSelection($query);
}

/**
 * 
 * @param type $limit max amount of products to display
 * @return array array of products
 */
function getLastProducts($limit = null){
    
    $query = "SELECT * FROM `product`  WHERE `status` = 1 ORDER BY `id` DESC ";
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
