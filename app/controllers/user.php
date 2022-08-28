<?php

include_once(ROOT_PATH . '/app/database/db.php');
require_once(ROOT_PATH . '/app/helpers/Middleware.php');
include (ROOT_PATH . "/app/helpers/validateUser.php");

$errors = array();
$table = 'users';
$admin_users= selectAll($table);
$Id = '';
$admin = '';
$username = '';
$Email = '';
$Paaword = '';
$PaawordConf = '';
$user_id = '';



if(isset($_GET['Id'])){
    $user = selectOne($table, ['Id' => $_GET['Id']]);

    $Id = $user['Id'];
    $username = $user['username'];
    $admin = $user['admin'] ;
    $Email = $user['Email'];
    
}



if(isset($_GET['delete_id'])){
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Admin deleted successfully!';
    $_SESSION['type'] = 'msg-logged';
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();

}



 function loginUser($user){

    $_SESSION['Id'] = $user['Id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'You are now logged in!';
    $_SESSION['type'] = 'Success';
    if($_SESSION['admin']){
        header('location: ' . BASE_URL . '/admin/dashboard.php');
    }
    
    else{
        header('location: ' . BASE_URL . '/index.php');
    }
    exit();    
 }


if(isset($_POST['Register']) || isset($_POST['create-admin'])){
    $errors = validateUser($_POST);
    
    if(count($errors) === 0){
        unset($_POST['Register'], $_POST['PaawordConf'], $_POST['create-admin']);
        $_POST['Paaword'] = password_hash($_POST['Paaword'], PASSWORD_DEFAULT);
            

        if(isset($_POST['admin'])){
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = 'Admin Created Successfully';
            $_SESSION['type'] = 'msg-logged';
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();

        }
        else{
        $_POST['admin'] = 0;
        $user_id = create($table, $_POST);
        $user = selectOne($table, ['Id'=> $user_id]);
        loginUser($user);
        
        }

        
    }
    else{
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $Email = $_POST['Email'];
        $Paaword = $_POST['Paaword'];
        $PaawordConf = $_POST['PaawordConf'];
    }
}

if(isset($_POST['login'])){
    $errors = validateLogin($_POST);

    if(count($errors) === 0){
        $user = selectOne($table, ['username' => $_POST['username']]);
        if($user && password_verify($_POST['Paaword'], $user['Paaword'])){
                loginUser($user);    
    
        }

        else{
            array_push($errors, 'Wrong username or password');
        }
    }
    $username = $_POST['username'];
    $Paaword = $_POST['Paaword'];
}


if(isset($_POST['update-user'])){
    adminOnly();
    $errors = validateUser($_POST);
    
    if(count($errors) === 0){
        $id = $_POST['Id'];
        unset($_POST['update-user'], $_POST['PaawordConf'], $_POST['id']);
        $_POST['Paaword'] = password_hash($_POST['Paaword'], PASSWORD_DEFAULT);
            
            $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
            $user_id = update($table, $id, $_POST);
            $_SESSION['message'] = 'Admin updated Successfully';
            $_SESSION['type'] = 'msg-logged';
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();

        
        
    }
    else{
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $Email = $_POST['Email'];
        $Paaword = $_POST['Paaword'];
        $PaawordConf = $_POST['PaawordConf'];
    }


    }