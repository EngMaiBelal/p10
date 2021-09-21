<?php
// page => get
// email => session
// code => post
session_start();
include_once "../models/User.php";
if ($_GET) {
    if (isset($_GET['page'])) {
        $pages = ['login', 'register', 'forget','profile'];
        if (in_array($_GET['page'], $pages)) {
            $page = $_GET['page'];
        } else {
            header('location:../../errors/404.php');
        }
    } else {
        header('location:../../errors/404.php');
    }
} else {
    header('location:../../errors/404.php');
}
if (empty($_SESSION['email'])) {
    header('location:../../errors/404.php');
}
if (isset($_POST['check-code'])) {
    // validation
    // required , integer, 5 digits , exists in db
    $user = new User;
    $user->setCode($_POST['code']);
    $user->setEmail($_SESSION['email']);
    $userDB = $user->checkCodeByEmail();
    if ($userDB) {
        $result = $user->emailVerificaiton();
        if ($result) {
            switch ($page) {
                case 'login':
                case 'register':
                    $_SESSION['user'] = $userDB->fetch_object();
                    unset($_SESSION['email']);
                    header('location:../../index.php');
                    break;
                case 'forget': 
                    header('location:../../set-password.php');
                    break;
                case 'profile':
                    // update user email; 
                    $user->setId($_SESSION['user']->id);
                    $user->setEmail($_SESSION['new_email']);
                    $user->updateEmail();
                    $_SESSION['user']->email = $_SESSION['new_email'];
                    unset($_SESSION['email']);
                    unset($_SESSION['new_email']);
                    header('location:../../my-account.php');
                    break;
                default:
                    header('location:../../errors/404.php');
            }
        } else {
            $_SESSION['validation']['someting-wrong'] = 'something went wrong';
            header('location:../../check-code.php');
        }
    } else {
        $_SESSION['validation']['wrong-code'] = 'Wrong Code';
        header('location:../../check-code.php');
    }
} else {
    header('location:../../errors/403.php');
}
