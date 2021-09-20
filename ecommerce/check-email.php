<?php
include_once "layouts/header.php";
include_once "layouts/nav.php";
// print_r($_SESSION);die;
?>
<!-- header end -->
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>Check Email</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Check Email</li>
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
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> Check Email </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="app/php/checkEmail.php" method="post">
                                        <input type="email" name="email" placeholder="Email">
                                        <?php
                                        if (isset($_SESSION['validation']['email_validation'])) {
                                                echo "<div class='alert alert-danger'>Email NoT Exists</div>";
                                        }

                                        if (isset($_SESSION['validation']['something-wrong'])) {
                                            echo "<div class='alert alert-danger'>{$_SESSION['validation']['something-wrong']}</div>";
                                        }
                                        if (isset($_SESSION['validation']['faild-email'])) {
                                            echo "<div class='alert alert-danger'>{$_SESSION['validation']['faild-email']}</div>";
                                        }
                                        ?>
                                        <div class="button-box">
                                            <button type="submit" name="check-email"><span>Verify</span></button>
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
<?php include_once "layouts/footer.php"; ?>