<?php
session_start();
include_once "../validation/registerRequest.php";
include_once "../models/User.php";
if(empty($_SESSION['email'])){
    header('../../errors/404.php');
}

if(isset($_POST['set-password'])){
    $passwordValidation = new registerRequest;
    $passwordValidation->setConfirm_password($_POST['confirm_password']);
    $passwordValidation->setPassword($_POST['password']);
    $passwordValidationResult = $passwordValidation->passwordValidation();
    if($passwordValidationResult){
        $_SESSION['validation']['password_validation'] = $passwordValidationResult;
        header('location:../../set-password.php');
    }

    $userObj = new user;
    $userObj->setPassword($_POST['password']);
    $userObj->setEmail($_SESSION['email']);
    $reuslt = $userObj->updatePassword();
    if($reuslt){
        // goto to index.php
        // query => SELECT * FROM `users` WHERE `users`.`email` = '$this->email'
        // $user = queryResult->fetch_object()
        // $_SESSION['user'] = ;
        // unset($_SESSION['email']);
        // header('location:../../index.php');

        // goto login
        unset($_SESSION['email']);
        header('location:../../login.php');
    }else {
        $_SESSION['validation']['someting-wrong'] = 'something went wrong';
        header('location:../../set-password.php');
    }
}else{
    header('../../errors/403.php');
}