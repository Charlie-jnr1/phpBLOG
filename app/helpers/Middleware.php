<?php

function userOnly($redirect = '/index.php'){

    if(empty($_SESSION['Id'])){
        $_SESSION['message'] = 'You need to Login first';
        $_SESSION['type'] = 'success';
        header('location: '. BASE_URL . $redirect);
        exit(0);
    }

}

function adminOnly($redirect = '/index.php'){

    if(empty($_SESSION['Id']) || empty($_SESSION['admin'])){
        $_SESSION['message'] = 'You are not authorised to view this page';
        $_SESSION['type'] = 'success';
        header('location: '. BASE_URL . $redirect);
        exit(0);
    }

}


function guestOnly($redirect = '/index.php'){

    if(isset($_SESSION['Id'])){
        header('location: '. BASE_URL . $redirect);
        exit(0);
    }

}
