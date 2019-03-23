<?php

function createNewOrder($name, $phone, $address){
    filterSQLParams($name, $phone, $address);
    $userID = $_SESSION['user']['id'];
    $comment = "id пользователя: {$userID}<br />"
               . "Имя: {$name}<br />"
               . "Телефон: {$phone}<br />"
               . "Адрес: {$address}<br />";
    $dateCreated = date("Y.m.d H:i:s");
    $userIP = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
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

function updateOrderStatus($orderId, $status){
    $orderId = intval($orderId);
    $status = intval($status);
    $query = "UPDATE `order` SET `status` = '{$status}', `date_modification` = NOW()"
    . " WHERE `id` = '{$orderId}' LIMIT 1;";
    //debug($query);
    return executeUpdate($query);
}

function updateOrderModificationDate($orderId, $orderPaymentDate){
    $orderId = intval($orderId);
    filterSQLParams($orderPaymentDate);
    $query = "UPDATE `order` SET `date_payment` = '{$orderPaymentDate}',"
    . " `date_modification` = 'NOW()' WHERE `id` = '{$orderId}' LIMIT 1;";
    return executeUpdate($query);
}

/**
 * retrieves all orders of the user with given id
 * @param int $userId user id
 * $return array user orders
 */
function getUserOrders($userId){
    $userId = intval($userId);
    $sql = "SELECT * FROM `order` WHERE `user_id` = '{$userId}' ORDER by `id` DESC;";
    $userOrders = executeSelection($sql);
    foreach($userOrders as &$order){
        $orderId = $order['id'];
        $order['purchases'] = getPurchasesByOrder($orderId);
    }
    return $userOrders;
}

function getOrders(){
    $query = "SELECT o.*, u.name, u.email, u.address, u.phone FROM `order` AS o
             LEFT JOIN `user` AS u ON o.user_id = u.id ORDER BY `id` DESC;";
    $orders =  executeSelection($query);
    foreach($orders as &$order){
        $order['children'] = getProductsOfOrder($order['id']);
    }
    /*$orders = array_filter($order, function($item){
        return count($order['children']) > 0;
    });*/
    return $orders;
}

function getProductsOfOrder($orderId){
    $query = "SELECT * FROM purchase AS pu LEFT JOIN product AS pr"
            . " ON pu.product_id = pr.id WHERE pu.order_id = '{$orderId}'"
            . " ORDER BY pr.id DESC; ";
    return executeSelection($query);
}