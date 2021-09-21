<?php
session_start();
include_once "../validation/registerRequest.php";
include_once "../models/User.php";
include_once "../mail/sendMail.php";

if(isset($_POST['register'])){
    // validation
    $errors = [];
    $validaiton = new registerRequest;
    $validaiton->setEmail($_POST['email']);
    // email validation
    $emailValidation = $validaiton->emailValidation();
    if($emailValidation){
        $_SESSION['validation']['email_validation'] = $emailValidation;
        header('location:../../register.php');
    }else{
        // check email if exists in db
        $emailDataBaseCheckResult = $validaiton->emailDataBaseCheck();
        if($emailDataBaseCheckResult){
            $_SESSION['validation']['email_validation'] = $emailDataBaseCheckResult;
            // print_r($_SESSION);die;
            header('location:../../register.php');
        }
    }
    // password validation
    $validaiton->setPassword($_POST['password']);
    $validaiton->setConfirm_password($_POST['confirm_password']);
    $passwordValidation = $validaiton->passwordValidation();
    if($passwordValidation){
        $_SESSION['validation']['password_validation'] = $passwordValidation;
        header('location:../../register.php');
    }

    // insert user in db
    $user = new user;
    $user->setFirst_name($_POST['first_name']);
    $user->setLast_name($_POST['last_name']);
    $user->setEmail($_POST['email']);
    $user->setPhone($_POST['phone']);
    $user->setPassword($_POST['password']);
    $user->setGender($_POST['gender']);
    $user->setBirthdate($_POST['birthdate']);
    $code = rand(10000,99999);
    $user->setCode($code);
    $result = $user->create();
    if($result){
        // send code in db
        $email = new sendMail;
        $body  = "Dear {$_POST['first_name']} <br> You Verificaiton Code:<b>$code</b> <br> Thank You.";
        $emailResult = $email->sendEmail($_POST['email'],'Verification code',$body);
        if($emailResult){
            // goto check code 
            $_SESSION['email'] = $_POST['email'];
            header('location:../../check-code.php?page=register');
        }else{
            $_SESSION['validation']['faild-email'] = 'Please Try Again';
            header('location:../../register.php');
        }
        
        
       
    }else{
        $_SESSION['validation']['something-wrong'] = 'Something Went Wrong';
        header('location:../../register.php');
    }
   

}else{
    header('location:../../errors/403.php');
}

