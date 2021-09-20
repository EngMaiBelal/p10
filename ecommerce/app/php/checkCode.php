<?php
session_start();
include_once "../models/User.php";
if(isset($_POST['check-code'])){
   // validation
   // required , integer, 5 digits , exists in db
    $user = new User;
    $user->setCode($_POST['code']);
    $user->setEmail($_SESSION['email']);
    $userDB = $user->checkCodeByEmail();
    if($userDB){
        $result = $user->emailVerificaiton();
        if($result){
            $_SESSION['user'] = $userDB->fetch_object();
            unset($_SESSION['email']);
            header('location:../../index.php');
        }else{
            $_SESSION['validation']['someting-wrong'] = 'something went wrong';
            header('location:../../check-code.php');
        }
    }else{
        $_SESSION['validation']['wrong-code'] = 'Wrong Code';
        header('location:../../check-code.php');
    }
}else{
    header('location:../../errors/403.php');
}