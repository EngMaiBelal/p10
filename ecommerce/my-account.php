<?php
include_once "layouts/header.php";
include_once "app/middlewares/auth.php";
include_once "layouts/nav.php";
include_once "app/models/User.php";
include_once "app/validation/registerRequest.php";
include_once "app/mail/sendMail.php";
// print_r($_SESSION);
// die;

$userObject = new user;
$userObject->setEmail($_SESSION['user']->email);

// database update
// session update
$errors = [];

if (isset($_POST['update-profile'])) {
    // validation
    // upload photo
    if ($_FILES['image']['error'] == 0) {
        $maxUploadFile = 10 ** 6;
        if ($_FILES['image']['size'] > $maxUploadFile) {
            $errors['image']['image-size'] = "<div class='alert alert-danger'> Too Large File , max size is 1 mega byte </div>";
        }
        $allowedExtensions = ['png', 'jpg'];
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        if (!in_array($extension, $allowedExtensions)) {
            $errors['image']['image-ext'] = "<div class='alert alert-danger'> Uploaded Files Must be of type png or jpg only </div>";
        }
        if (empty($errors)) {
            $directory = 'assets/img/users/';
            $photoName = time() .  '.' . $extension;
            $fullPath = $directory . $photoName;
            move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);
            $userObject->setImage($photoName);
        }
    }

    if (empty($errors)) {
        // update info
        $result = $userObject
            ->setFirst_name($_POST['first_name'])
            ->setLast_name($_POST['last_name'])
            ->setPhone($_POST['phone'])
            ->setGender($_POST['gender'])
            ->setBirthdate($_POST['birthdate'])
            ->update();
        if ($result) {
            $_SESSION['user']->first_name  = $_POST['first_name'];
            $_SESSION['user']->last_name  = $_POST['last_name'];
            $_SESSION['user']->phone  = $_POST['phone'];
            $_SESSION['user']->gender  = $_POST['gender'];
            $_SESSION['user']->birthdate  = $_POST['birthdate'];
            if (isset($photoName)) {
                $_SESSION['user']->image = $photoName;
            }


            $success = "<div class='alert alert-success'> Data Updated Successfully </div>";
        } else {
            $errors['something-wrong-profile'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
        }
    }
}

if (isset($_POST['change-password'])) {

    // verify => new password , confrim => required , new = confrim , new => regex
    $passwordValidation = new registerRequest;
    $passwordValidationResult = $passwordValidation
        ->setPassword($_POST['new_password'])
        ->setConfirm_password($_POST['confrim_password'])
        ->passwordValidation();

    // old password is required
    if (empty($_POST['old_password'])) {
        $passwordValidationResult['old-required'] = 'Old Password is required';
    }
    // if no errors
    if (empty($passwordValidationResult)) {

        // check if old password != old password in DB
        $userObject->setPassword($_POST['old_password']);
        if ($_SESSION['user']->password !=  $userObject->getPassword()) {
            $passwordValidationResult['old-wrong'] = 'Old Password is Wrong';
        }
        // check if old password == new password 
        $userObject->setPassword($_POST['new_password']);
        if ($_SESSION['user']->password == $userObject->getPassword()) {
            $passwordValidationResult['old-password'] = " You Have Entered Your Old Password ";
        } else {
            // update
            $result = $userObject->updatePassword();
            if ($result) {
                $changePasswordSuccess = "<div class='alert alert-success'> Data Updated Successfully </div>";
            } else {
                $errors['something-wrong-password'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
            }
        }
    }
    // update password on db
}

if (isset($_POST['change-email'])) {
    // validate 
    $emailValidation = new registerRequest;
    $emailValidation->setEmail($_POST['email']);
    $emailValidationResult = $emailValidation->emailValidation();
    if (empty($emailValidationResult)) {
        if ($_POST['email'] != $_SESSION['user']->email) {
            $emailDataBaseCheckResult = $emailValidation->emailDataBaseCheck();
            if (empty($emailDataBaseCheckResult)) {
                // send mail with new code
                $code = rand(10000, 99999);
                $userObject->setCode($code);
                $result = $userObject->updateCode();

                if ($result) {
                    // send code in db
                    // query to get user data from email
                    $email = new sendMail;
                    $body  = "You Verificaiton Code:<b>$code</b> <br> Thank You.";
                    $emailResult = $email->sendEmail($_POST['email'], 'Verification code', $body);
                    if ($emailResult) {
                        // goto check code 
                        $_SESSION['email'] = $_SESSION['user']->email;
                        $_SESSION['new_email'] = $_POST['email'];
                        header('location:check-code.php?page=profile');
                    } else {
                        $errors['faild-email'] = '<div class="alert alert-danger"> Please Try Again </div>';
                    }
                } else {
                    $errors['something-wrong-email'] = '<div class="alert alert-danger"> Something went wrong </div>';
                }
            }
        } else {
            $errors['old-email'] = '<div class="alert alert-danger"> Please Change Your Email </div>';
        }
    }
    // required
    // regex
    // msh exists in db

    //generate code
    // update code to this user
    // send mail with new code 
    // check code
}

$userData = $userObject->getUserByEmail();
$user = $userData->fetch_object();
?>
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>MY ACCOUNT</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">My Account</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- my account start -->
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse <?= isset($_POST['update-profile']) ? 'show' : '' ?>">
                                <!-- show -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php
                                            if (isset($success)) {
                                                echo $success;
                                            }
                                            if (isset($errors['something-wrong-profile'])) {
                                                echo $errors['something-wrong-profile'];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>My Account Information</h4>
                                                <h5>Your Personal Details</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 offset-4 mb-3">
                                                    <img src="assets/img/users/<?php
                                                                                if ($user->image == 'default.png') {
                                                                                    if ($user->gender == 'f') {
                                                                                        echo 'f.png';
                                                                                    } else {
                                                                                        echo 'm.png';
                                                                                    }
                                                                                } else {
                                                                                    echo $user->image;
                                                                                }
                                                                                ?>" class="w-100 rounded-circle" alt="">
                                                    <input type="file" name="image" id="" class="form-control">
                                                    <?php
                                                    if (isset($errors['image'])) {
                                                        foreach ($errors['image'] as $key => $value) {
                                                            echo $value;
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name" value="<?= $user->first_name; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" value="<?= $user->last_name; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="billing-info">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone" value="<?= $user->phone; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="billing-info">
                                                        <label>Birthdate</label>
                                                        <input type="date" name="birthdate" value="<?= $user->birthdate; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="billing-info">
                                                        <label>Gender</label>
                                                        <select name="gender" class="form-control" id="">
                                                            <option <?= $user->gender == 'm' ? 'selected' : '' ?> value="m">Male</option>
                                                            <option <?php if ($user->gender == 'f') {
                                                                        echo 'selected';
                                                                    } ?> value="f">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="update-profile">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse <?= isset($_POST['change-password']) ? 'show' : "" ?>">
                                <div class="panel-body">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-12">
                                                <?php
                                                if (isset($passwordValidationResult)) {
                                                    foreach ($passwordValidationResult as $key => $value) {
                                                        echo "<div class='alert alert-danger'>$value</div>";
                                                    }
                                                }
                                                if (isset($changePasswordSuccess)) {
                                                    echo $changePasswordSuccess;
                                                }
                                                if (isset($errors['something-wrong-password'])) {
                                                    echo $errors['something-wrong-password'];
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>Change Password</h4>
                                                <h5>Your Password</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Old Password</label>
                                                        <input type="password" name="old_password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>New Password</label>
                                                        <input type="password" name="new_password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Confirm Password </label>
                                                        <input type="password" name="confrim_password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="change-password">Change</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Change your email </a></h5>
                            </div>
                            <div id="my-account-3" class="panel-collapse collapse <?php if (isset($_POST['change-email'])) {
                                                                                        echo "show";
                                                                                    } ?>">
                                <div class="panel-body">
                                    <form method="post">
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>Change Email</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="<?= $user->email ?>">
                                                        <?php
                                                        if (isset($emailValidationResult)) {
                                                            foreach ($emailValidationResult as $key => $value) {
                                                                echo "<div class='alert alert-danger'>$value</div>";
                                                            }
                                                        }
                                                        if (isset($emailDataBaseCheckResult)) {
                                                            foreach ($emailDataBaseCheckResult as $key => $value) {
                                                                echo "<div class='alert alert-danger'>$value</div>";
                                                            }
                                                        }
                                                        if (isset($errors['old-email'])) {
                                                            echo $errors['old-email'];
                                                        }

                                                        if(isset($errors['faild-email'])){
                                                            echo $errors['faild-email'];
                                                        }

                                                        if(isset($errors['something-wrong-email'])){
                                                            echo $errors['something-wrong-email'];
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="change-email">Change</button>
                                                </div>
                                            </div>
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