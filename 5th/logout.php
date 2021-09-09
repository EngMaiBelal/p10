<?php
session_start();
include_once "middlewares/auth.php";
// unset($_SESSION['user']);
session_unset();
session_destroy();
header('location:login.php');