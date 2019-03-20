<?php

function connectPurchasesToOrder($orderId, $saleCart){
    $query = "INSERT INTO purchase (`product_id`,`order_id`,`price`,`amount`) VALUES ";
    $valuesToInsert = [];
    foreach($saleCart as $product){
        array_push($valuesToInsert, "({$product['id']}, {$orderId}, {$product['price']}, {$product['count']})");
    }
    
    $query = $query.implode($valuesToInsert, ", ").";";
    return executeUpdate($query);
}


function getPurchasesByOrder($orderId){
    $orderId = intval($orderId);
    $query = "SELECT pur.*, pr.`name` AS product_name FROM `purchase` AS pur"
            . " JOIN `product` AS pr ON pur.`product_id` = pr.`id`"
            . " WHERE pur.`order_id` = '{$orderId}';";
    return executeSelection($query);
}
