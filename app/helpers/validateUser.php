<?php
 function validateUser($user)
 {
    $errors = array();

    if(empty($user['username'])){
        array_push($errors, 'Username is required !');
    }

    if(empty($user['Email'])){
        array_push($errors, 'Email is required !');
    }

    if(empty($user['Paaword'])){
        array_push($errors, 'Password is required !');
    }

    if(($user['PaawordConf'] !== $user['Paaword'])){
        array_push($errors, 'Passwords do not Match !');
    }

    // $existingUser = selectOne('users', ['Email' => $user['Email']]);
    // if(($existingUser)){
    //     array_push($errors, 'Email already exists !');
 
    // }
    

    $existingUser = selectOne('users', ['Email' => $user['Email']]);
    if($existingUser){
        if($user['update-user'] = 1 && $existingUser['Id'] != $user['Email']){
            array_push($errors, 'User with email already exists !');
        }

        if(isset($user['create-admin'])){
            array_push($errors, 'User with email already exists !');
        }
        
    }
    

    return $errors;


 }

 function validateLogin($user){
    $errors = array();

    if(empty($user['username'])){
        array_push($errors, 'Username is required !');
    }

    if(empty($user['Paaword'])){
        array_push($errors, 'Password is required !');
    }

    return $errors;
}