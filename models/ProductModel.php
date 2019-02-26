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

function getProductsByCategoryId($categoryId){
    $id = intval($categoryId);
    $query = "SELECT * FROM product WHERE category_id = '{$id}';";
    //echo "<br>".$query."<br>";
    return executeSelection($query);
}
