<?php

/**
 * This is the model of category table
 */

include_once '../config/db.php';

/**
 * Creates a new product category
 * @param string $categoryName category name
 * @param int $parentCategoryId parent category id
 * @return id of last created category in the case of success and FALSE otherwise
 */
function createNewCategory($categoryName, $parentCategoryId = 0){
    filterSQLParams($categoryName);
    $parentCategoryId = intval($parentCategoryId);
    $query = "INSERT INTO category (`name`,`parent_id`)"
            . " VALUES('{$categoryName}','{$parentCategoryId}');";
            
    if(executeUpdate($query)){
        $query = "SELECT `id` FROM category ORDER BY `id` DESC LIMIT 1;";
        $res = executeSelection($query);
        if(isset($res[0])){
            return $res[0];
        }
    }
    return false;
}

function updateCategory($categoryId, $newName, $newParentId = -1){
    filterSQLParams($newName);
    $categoryId = intval($categoryId);
    $newParentId = intval($newParentId);
    $set = " SET `name` = '{$newName}' ";
    if($newParentId != -1){
        $set .= " , `parent_id` = {$newParentId} ";
    }
    $query = "UPDATE category {$set} WHERE `id` = {$categoryId} LIMIT 1;";
    //debug($query);
    return executeUpdate($query);
}

/**
 * retrieves all the children of given category id
 * @param type $categotyId category id
 * @return array of category children
 */
function getCategoryChildren($categotyId){
    $id = intval($categotyId);
    $query = "SELECT * FROM category WHERE parent_id = {$id};";
    return executeSelection($query);
}

/**
 * yields all main categories
 * @return array
 */
function getAllMainCategories(){
    $query = "SELECT * FROM category WHERE parent_id = 0;";
    return executeSelection($query);
}

/**
 * yields all categories
 * @return array
 */
function getAllCategories(){
    $query = "SELECT * FROM `category` ORDER BY parent_id ASC;";
    return executeSelection($query);
}

/**
 * retrieves all main categories including children
 * @return array
 */
function getAllMainCategoriesWithChildren(){
    $categories = getAllMainCategories();
    
    foreach ($categories as &$category) {
        $children = getCategoryChildren($category['id']);
        
        if($children){
            $category['children'] = $children;
        }
    }
    return $categories;
}

/**
 * fetches category by id
 * @param type $categoryId category id
 * @return category if exists or null otherwise
 */
function getCategoryById($categoryId){
    $id = intval($categoryId);
    $query = "SELECT * FROM category where id = '{$id}';";
    $res = executeSelection($query);
    return count($res) > 0 ? $res[0] : null;
}


