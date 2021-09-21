<?php 
include_once "layouts/header.php";
// include_once "layouts/nav.php" ;

?>
    <!-- header end -->
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>Check Code</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Check Code</li>
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
                                <h4> Check Code </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div class="alert alert-success"> We have sent an email to you , Check Your Email Address  </div>
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="app/php/checkCode.php?page=<?= $_GET['page'] ?>" method="post">
                                            <input type="number" name="code" placeholder="Code">
                                            <?php 
                                            if(isset($_SESSION['validation']['wrong-code'])){
                                                echo "<div class='alert alert-danger'> {$_SESSION['validation']['wrong-code']} </div>";
                                            }

                                            if(isset(  $_SESSION['validation']['someting-wrong'] )) {
                                                echo "<div class='alert alert-danger'> {$_SESSION['validation']['someting-wrong']} </div>";
                                            }
                                            ?>
                                            <div class="button-box">
                                                <button type="submit" name="check-code"><span>Verify</span></button>
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