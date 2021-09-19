<?php
include_once "../validation/registerRequest.php";
session_start();
if(isset($_POST['register'])){
    $errors = [];
    $validaiton = new registerRequest;
    $validaiton->setEmail($_POST['email']);
    $emailValidation = $validaiton->emailValidation();
    if($emailValidation){
        $_SESSION['validation']['email_validation'] = $emailValidation;
        header('location:../../register.php');
    }else{
        $emailDataBaseCheckResult = $validaiton->emailDataBaseCheck();
        if($emailDataBaseCheckResult){
            $_SESSION['validation']['email_validation'] = $emailDataBaseCheckResult;
            // print_r($_SESSION);die;
            header('location:../../register.php');
        }
    }

    $validaiton->setPassword($_POST['password']);
    $validaiton->setConfirm_password($_POST['confirm_password']);
    $passwordValidation = $validaiton->passwordValidation();
    if($passwordValidation){
        $_SESSION['validation']['password_validation'] = $passwordValidation;
        header('location:../../register.php');
    }

    // chack if email exists in db
    

    // check if phone exits in db
}else{
    header('location:../../errors/403.php');
}

