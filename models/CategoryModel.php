<?php

/**
 * This is the model of category table
 */

include_once '../config/db.php';

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
 * retrieves all main categories including children
 * @return array
 */
function getAllMainCategoriesWithChildren(){
    $query = "SELECT * FROM category WHERE parent_id = 0;";
    $categories = executeSelection($query);
    
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


