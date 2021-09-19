<?php
session_start();
include_once "layouts/header.php";
include_once "layouts/nav.php";
// print_r($_SESSION);die;
?>
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>Register</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Register</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                                <div id="lg2" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="app/php/register.php" method="post">
                                                <input type="text" name="first_name" placeholder="First Name">
                                                <input type="text" name="last_name" placeholder="Last Name">
                                                <input type="tel" name="phone" placeholder="Phone">
                                                <input type="email" name="email" placeholder="Email">
                                                <?php 
                                                    if(isset($_SESSION['validation']['email_validation'])){
                                                        foreach ($_SESSION['validation']['email_validation'] as $key => $value) {
                                                                echo "<div class='alert alert-danger'>$value</div>";
                                                        }
                                                    }


                                                ?>
                                                <input type="password" name="password" placeholder="Password">
                                                <?php 
                                                    if(isset($_SESSION['validation']['password_validation'])){
                                                        if(isset($_SESSION['validation']['password_validation']['password-required'])){
                                                            echo "<div class='alert alert-danger'>{$_SESSION['validation']['password_validation']['password-required']}</div>";
                                                        }
                                                        if(isset($_SESSION['validation']['password_validation']['password-invalid'])){
                                                            echo "<div class='alert alert-danger'>{$_SESSION['validation']['password_validation']['password-invalid']}</div>";
                                                        }
                                                    }
                                                ?>
                                                <input type="password" name="confirm_password" placeholder="Confrim Password">
                                                <?php 
                                                    if(isset($_SESSION['validation']['password_validation'])){
                                                        if(isset($_SESSION['validation']['password_validation']['confrim-password-required'])){
                                                            echo "<div class='alert alert-danger'>{$_SESSION['validation']['password_validation']['confrim-password-required']}</div>";
                                                        }
                                                        if(isset($_SESSION['validation']['password_validation']['confrim-password-invalid'])){
                                                            echo "<div class='alert alert-danger'>{$_SESSION['validation']['password_validation']['confrim-password-invalid']}</div>";
                                                        }
                                                    }
                                                ?>
                                                <input type="date" name="birthdate">
                                                <select name="gender" id="" class="form-control">
                                                    <option value="m">Male</option>
                                                    <option value="f">Female</option>
                                                </select>
                                                <div class="button-box mt-5">
                                                    <button type="submit" name="register"><span>Register</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php

include_once "layouts/footer.php";
?>
