<?php

/* 
 * User controller
 */

include_once '../models/CategoryModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/UsersModel.php';

function registerAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;
    
    $resData = checkRegisterParams($email, $pwd1, $pwd2);
    
    if(count($resData) == 0 and checkIfEmailExists($email)){
        $resData['success'] = 0;
        $resData['message'] = "Пользователь уже зарегестрирован"; 
    }
    
    if(count($resData) == 0){
        $pwdMD5 = md5($pwd1);
        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $address);
        
        if($userData['success']){
            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email']; 
            $resData['userEmail'] = $userData['email'];
            
            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $resData['userName'];
            
        } else {
            $resData['success'] = 0;
            $resData['message'] = "Ошибка регистрации"; 
        }
    }
    
    echo json_encode($resData);
}
