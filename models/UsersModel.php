<?php

/**
 * This is the model of user table
 */

include_once '../config/db.php';

/**
 * register a new user
 * @param string $email user email
 * @param string $passwordMD5 user password encrypted with MD5 algorithm 
 * @param string $name user name
 * @param string $phone user phone
 * @param string $address user address
 * return array registered user credentials
 */

function checkRegisterParams($email, $pwd1, $pwd2){
    $res = array();
    
    if(! $email){
        $res['success'] = 0;
        $res['message'] = "Введите email!";
    }
    
    if(! $pwd1){
        $res['success'] = 0;
        $res['message'] = "Введите пароль";
    }
    
    if(! $pwd2){
        $res['success'] = 0;
        $res['message'] = "Введите еще раз пароль для потверждения";
    }
    
    if($pwd1 !== $pwd2){
        $res['success'] = 0;
        $res['message'] = "Пароли не совпадают";
    }
    
    return $res;
}

function registerNewUser($email, $passwordMD5, $name, $phone, $address){
    $db = Database::getInstance();
    $connection = $db->getConnection();
    $email = htmlspecialchars(mysqli_real_escape_string($connection, $email));
    $name = htmlspecialchars(mysqli_real_escape_string($connection, $name));
    $phone = htmlspecialchars(mysqli_real_escape_string($connection, $phone));
    $address = htmlspecialchars(mysqli_real_escape_string($connection, $address));
    $db->closeConnection();
    
    $sql = "INSERT INTO `user` (`email`, `password`, `name`, `phone`, `address`) "
            . " VALUES('{$email}', '{$passwordMD5}', '{$name}', '{$phone}',"
            . " '{$address}');";
    
    $rs = array();
    if(executeUpdate($sql)){
        $sql = "SELECT * FROM user WHERE (`email` = '{$email}' AND "
        . " `password` = '{$passwordMD5}') LIMIT 1;";
        $rs = executeSelection($sql);
        if($rs and count($rs) > 0){
            $rs['success'] = 1;
        } else {
            $rs['success'] = 0;
        }
    } else {
        $rs['success'] = 0;
    }
    return $rs;
}

function checkIfEmailExists($email){
    $db = Database::getInstance();
    $connection = $db->getConnection();
    $email = mysqli_real_escape_string($connection, $email);
    $db->closeConnection();
    $sql = "SELECT id FROM `user` WHERE `email` = '{$email}' LIMIT 1;";
    $rs = executeSelection($sql);
    return $rs and count($rs) > 0;
}

/**
 * 
 * @param string $email user email
 * @param string $password user password
 * @return array user data
 */
function loginUser($email, $password){
    //Check email
    $db = Database::getInstance();
    $connection = $db->getConnection();
    $email = htmlspecialchars(mysqli_real_escape_string($connection, $email));
    $db->closeConnection();
    
    //Encrypt password
    $password = md5($password);
    
    $sql = "SELECT * FROM user WHERE (`email` = '{$email}' "
           . "AND `password` = '{$password}') LIMIT 1;";
    $rs = executeSelection($sql);
    if(isset($rs[0])){
        $rs['success'] = 1;
    } else {
        $rs['success'] = 0;
    }
    
    return $rs;
}
