<?php
session_start();
include_once "../validation/registerRequest.php";
include_once "../models/User.php";
include_once "../mail/sendMail.php";
if(isset($_POST['check-email'])){
    // vlidate => required , regex , exists
    $errors = [];
    $validaiton = new registerRequest;
    $validaiton->setEmail($_POST['email']);
    // email validation
    $emailValidation = $validaiton->emailValidation();
    
    if($emailValidation){
        // print_r($emailValidation);
        $_SESSION['validation']['email_validation'] = $emailValidation;
        header('location:../../check-email.php');die;
    }else{
        // check email if exists in db
        $emailDataBaseCheckResult = $validaiton->emailDataBaseCheck();
        if(empty($emailDataBaseCheckResult)){
            $_SESSION['validation']['email_validation'] = $emailDataBaseCheckResult;
            // print_r($_SESSION);die;
            header('location:../../check-email.php');die;
        }
    }
    // send mail with new code
    $code = rand(10000,99999);
    $user = new user;
    $user->setEmail($_POST['email']);
    $user->setCode($code);
    $result = $user->updateCode();

    if($result){
        // send code in db
        // query to get user data from email
        $email = new sendMail;
        $body  = "You Verificaiton Code:<b>$code</b> <br> Thank You.";
        $emailResult = $email->sendEmail($_POST['email'],'Verification code',$body);
        if($emailResult){
            // goto check code 
            $_SESSION['email'] = $_POST['email'];
            header('location:../../check-code.php?page=forget');
        }else{
            $_SESSION['validation']['faild-email'] = 'Please Try Again';
            header('location:../../check-email.php');
        }
    }else{
        $_SESSION['validation']['something-wrong'] = 'Something went wrong';
        header('location:../../check-email.php');
    }

}else{
    header('location:../../errors/403.php');
}