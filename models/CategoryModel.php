<?php

include_once '../config/db.php';

function getAllMainCategoriesWithChildren(){
    $query = "SELECT * FROM category WHERE parent_id = 0;";
    $db = Database::getInstance();
    $connection = $db->getConnection();
    $rs = mysqli_query($connection, $query);
    $smartyRs = array();
    while($row = $rs->fetch_assoc()){
        array_push($smartyRs, $row);
    }
    $db->closeConnection();
    return $smartyRs;
}