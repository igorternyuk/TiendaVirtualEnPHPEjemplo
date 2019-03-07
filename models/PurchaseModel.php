<?php

function connectPurchasesToOrder($orderId, $saleCart){
    $sql = "INSERT INTO purchase (`product_id`,`order_id`,`price`,`amount`) VALUES ";
    $valuesToInsert = [];
    foreach($saleCart as $product){
        array_push($valuesToInsert, "({$product['id']}, {$orderId}, {$product['price']}, {$product['count']})");
    }
    
    $sql = $sql.implode($valuesToInsert, ", ").";";
    return executeUpdate($sql);
}
