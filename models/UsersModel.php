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

/**
 * Registers a new user
 * @param string $email user email
 * @param string $passwordMD5 user password encrypted with MD% algorithm
 * @param string $name user name
 * @param string $phone user phone
 * @param string $address user address
 * @return array information about operation(success)
 */
function registerNewUser($email, $passwordMD5, $name, $phone, $address){
    filterSQLParams($email, $name, $phone, $address);
    
    $sql = "INSERT INTO `user` (`email`, `password`, `name`, `phone`, `address`) "
            . " VALUES('{$email}', '{$passwordMD5}', '{$name}', '{$phone}',"
            . " '{$address}');";
    
    $rs = array();
    if(executeUpdate($sql)){
        $sql = "SELECT * FROM `user` WHERE (`email` = '{$email}' AND "
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

/**
 * Checks if given email exists
 * @param string $email
 * @return boolean TRUE if given email exists anf FALSE otherwise
 */
function checkIfEmailExists($email){
    $email = filterSQLParams($email);
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
    filterSQLParams($email);
    //debug($email);
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

/**
 * Upsates user information
 * @param string $name user name
 * @param string $phone user phone 
 * @param string $address user address
 * @param string $pwd1 user new password
 * @param string $pwd2 repeated user new password
 * @param string $currPwd current user password
 * @return boolean TRUE in the case of success and FALSE otherwise
 */
function updateCurrentuserData($name, $phone, $address, $pwd1, $pwd2, $currPwd){
    $email = $_SESSION['user']['email'];
    filterSQLParams($email, $name, $phone, $address, $pwd1, $pwd2, $currPwd);
    $pwd1 = trim($pwd1);
    $pwd2 = trim($pwd2);
    $currPwd = trim($currPwd);
    if($currPwd && (!$pwd1 || ($pwd1 == $pwd2))){
        $currPwdMD5 = md5($currPwd);
        $sql = "UPDATE user SET ";
        if($pwd1){
            $newPwdMD5 = md5($pwd1);
            $sql .= "  `password` = '{$newPwdMD5}', ";
        }
        $sql .= " `name` = '{$name}', `phone` = '{$phone}',"
            . " `address` = '{$address}' WHERE (`email` = '{$email}'"
            . " AND `password` = '{$currPwdMD5}') LIMIT 1;";
        return executeUpdate($sql);
    }
    return false;        
}

function getCurrentUserOrders(){
    $currUserId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0; 
    return getUserOrders($currUserId);
}

