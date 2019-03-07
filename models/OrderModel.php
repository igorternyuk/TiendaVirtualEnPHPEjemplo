<?php

function createNewOrder($name, $phone, $address){
    filterSQLParams($name, $phone, $address);
    $userID = $_SESSION['user']['id'];
    $comment = "id пользователя: {$userID}<br />"
               . "Имя: {$name}<br />"
               . "Телефон: {$phone}<br />"
               . "Адрес: {$address}<br />";
    $dateCreated = date("Y.m.d H:i:s");
    $userIP = $_SERVER['REMOTE_ADDR'];
    $totalSum = isset($_SESSION['saleCartTotal']) ? $_SESSION['saleCartTotal'] : 0;
    $sql = "INSERT INTO `order` (`user_id`, `date_created` , `date_payment`,"
           . " `status`, `comment`, `user_ip`, `total_sum`) VALUES"
           . " ({$userID}, '{$dateCreated}', null, '0', '{$comment}',"
           . " '{$userIP}', {$totalSum});";
    
    if(executeUpdate($sql)){
        $lastOrderIDSql = "SELECT id FROM `order` ORDER BY id DESC LIMIT 1;";
        $rs = executeSelection($lastOrderIDSql);
        if(isset($rs[0])){
            return $rs[0]['id'];
        }
    }
    return false;
}