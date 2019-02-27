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
    //echo "<br>".$query."<br>";
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
