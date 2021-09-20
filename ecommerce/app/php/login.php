<?php
session_start();
include_once "../validation/loginRequest.php";
include_once "../validation/registerRequest.php";
include_once "../models/User.php";
include_once "../mail/sendMail.php";
if (isset($_POST['login'])) {

    // validation
    // email=> required , regex ,
    $emailValidationObj = new registerRequest;
    $emailValidationObj->setEmail($_POST['email']);
    $emailValidationResult = $emailValidationObj->emailValidation();
    if ($emailValidationResult) {
        $_SESSION['validation']['email_validation'] = $emailValidationResult;
        header('location:../../login.php');
    }


    // password => required , regex 
    $passwordValidationObj = new loginRequest;
    $passwordValidationObj->setPassword($_POST['password']);
    $passwordValidationResult = $passwordValidationObj->passwordValidation();
    if ($passwordValidationResult) {
        $_SESSION['validation']['password_validation'] = $passwordValidationResult;
        header('location:../../login.php');
    }

    //check on user in db
    $userobj = new user;
    $userobj->setEmail($_POST['email']);
    $userobj->setPassword($_POST['password']);
    $userDb = $userobj->login();
    if($userobj){
        $user = $userDb->fetch_object();
        if($user->email_verified_at){
            $_SESSION['user'] = $user;
            header('location:../../index.php');
        }else{
            // send code in db
            $email = new sendMail;
            $body  = "Dear {$user->first_name} <br> You Verificaiton Code:<b>$user->code</b> <br> Thank You.";
            $emailResult = $email->sendEmail($_POST['email'],'Verification code',$body);
            if($emailResult){
                // goto check code 
                $_SESSION['email'] = $_POST['email'];
                header('location:../../check-code.php');
            }else{
                $_SESSION['validation']['faild-email'] = 'Please Try Again';
                header('location:../../login.php');
            }
        }
    }else{
        $_SESSION['validation']['Failed-Attempt'] = 'Failed Attempt';
        header('location:../../login.php');
    }

} else {
    header('location:../../errors/403.php');
}
