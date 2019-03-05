<?php

/* 
 * User controller
 */

include_once '../models/CategoryModel.php';
include_once '../models/OrderModel.php';
include_once '../models/UsersModel.php';

/**
 * Registers a new user
 */
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
            $resData['success'] = 1;
            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email']; 
            $resData['userEmail'] = $userData['email'];
            
            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $resData['userName'];
            $resData['message'] = "Пользователь успешно зарегестрирован";
            
        } else {
            $resData['success'] = 0;
            $resData['message'] = "Ошибка регистрации"; 
        }
    }
    
    echo json_encode($resData);
}

/**
 * 
 * @param string loginEmail POST parameter - user email to login
 * @param string loginPassword POST parameter - user password
 * @return the JSON representation of information about operation (user data, displayName, success)
 */
function loginAction(){
    $email = isset($_REQUEST['loginEmail']) ? $_REQUEST['loginEmail'] : null;
    $email = trim($email);
    $password = isset($_REQUEST['loginPassword']) ? $_REQUEST['loginPassword'] : null; 
    $password = trim($password);
    $userData = loginUser($email, $password);
    if($userData['success']){
        $userData = $userData[0];
        $userData['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        $_SESSION['user'] = $userData;
        $userData['success'] = 1;
    } else {
        $userData['success'] = 0;
        $userData['message'] = "Неверный логин или пароль";
    }
    
    echo json_encode($userData);
}

function logoutAction(){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['user']);
    }
    redirect("/");
}

/**
 * Generates user page
 * @link /user/
 * @param smarty object $smarty template engine instance
 */
function indexAction($smarty){
    if(!isset($_SESSION['user'])){
        redirect("/");
    }
    
    $allCats = getAllMainCategoriesWithChildren();
    
    $smarty->assign("pageTitle", "Личный кабинет");
    $smarty->assign("allCats", $allCats);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}

/**
 * Updates user data
 * @return boolean TRUE if success and FALSE otherwise
 */
function updateAction(){

    if(!isset($_SESSION['user'])){
        redirect("/");
    }
    
    $email = isset($_POST['newEmail']) ? $_POST['newEmail'] : null; 
    $name = isset($_POST['newName']) ? $_POST['newName'] : null; 
    $phone = isset($_POST['newPhone']) ? $_POST['newPhone'] : null; 
    $address = isset($_POST['newAddress']) ? $_POST['newAddress'] : null; 
    $pwd1 = isset($_POST['newPwd1']) ? $_POST['newPwd1'] : null; 
    $pwd2 = isset($_POST['newPwd2']) ? $_POST['newPwd2'] : null; 
    $currPwd = isset($_POST['currPwd']) ? $_POST['currPwd'] : null; 
    $currPwdMD5 = md5($currPwd);
    
    $resData = array();
    if(!$currPwd || ($_SESSION['user']['password'] != $currPwdMD5)){
        $resData['success'] = 0;
        $resData['message'] = "Неправильный пароль";        
        
        echo json_encode($resData);
        return false;
    }
    
    $upateSuccess = updateCurrentuserData($name, $phone, $address, $pwd1, $pwd2, $currPwd);
    if($upateSuccess){
        $resData['success'] = 1;
        $resData['message'] = "Новые данные успешно сохранены";        
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['address'] = $address;
        if(($pwd1 && ($pwd1 == $pwd2))){
            $newPwd = md5(trim($pwd1));
            $_SESSION['user']['password'] = $newPwd;
        }
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];
        $resData['displayName'] = $_SESSION['user']['displayName'];
    } else {
        $resData['success'] = 0;
        $resData['message'] = "Ошибка сохранения данных";
    }
    echo json_encode($resData);
}
