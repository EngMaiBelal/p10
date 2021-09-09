<?php
include_once "layouts/header.php";
include_once "middlewares/auth.php";
include_once "layouts/nav.php";

if($_POST){
    
    // validation
    $errors = [];
    if(empty($_POST['name'])){
        $errors['name-required'] = "<div class='alert alert-danger'> Name Is Required </div>";
    }

    if(empty($_POST['email'])){
        $errors['email-required'] = "<div class='alert alert-danger'> Email Is Required </div>";
    }
    
    if(empty($_POST['gender'])){
        $errors['gender-required'] = "<div class='alert alert-danger'> Gender Is Required </div>";

    }

    if(empty($errors)){
        // upload photo
        if($_FILES['image']['error'] == 0){
            $maxUploadFile = 10 ** 6;
            $allowedExtensions = ['png','jpg','jpeg'];
            if($_FILES['image']['size'] > $maxUploadFile){
                $errors['image']['size'] = "<div class='alert alert-danger'> Size Must Be Less Than 1 MegaByte </div>";
            }

            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            if(!in_array($extension,$allowedExtensions)){
                $errors['image']['ext'] = "<div class='alert alert-danger'> Extension must be jpg,png or jpeg only </div>";
            }

            if(empty($errors)){
                $photoPath = 'images/';
                $photoName = time() . '.'  .  $extension ; // 1513151351.png
                $fullPath = $photoPath . $photoName;
                // file uploading
                move_uploaded_file($_FILES['image']['tmp_name'],$fullPath);
                $_SESSION['user']['image'] = $photoName;
            }

        }
        if(empty($errors['image'])){
            $_SESSION['user']['name'] = $_POST['name'];
            $_SESSION['user']['gender'] = $_POST['gender'];
            $_SESSION['user']['email'] = $_POST['email'];
            $success = "<div class='alert alert-success'> Data Updated Successfully </div>";
        }
        
    }

}
?>

<div class="container">
    <div class="row">
        <div class="col-12 text-dark text-center h1 mt-5">
            Profile
        </div>
        <div class="col-12  text-center">
            <?php 
                if(isset($success)){
                    echo $success;
                }
            ?>
        </div>
        <div class="col-8 offset-2">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-row my-5">
                    <div class="col-6 offset-3">
                        <img src="images/<?= $_SESSION['user']['image'] ?>" class="w-100 rounded-circle" alt="">
                        <input type="file" name="image" class="form-control">
                        <?php 
                            if(isset($errors['image'])){
                                foreach($errors['image'] AS $error){
                                    echo $error;
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <?php 
                            if(isset($errors['email-required'])){
                                echo $errors['email-required'];
                            }
                        ?>
                    </div>
                    <div class="col-6">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>" class="form-control" id="exampleInputPassword1">
                        <?php 
                            if(isset($errors['name-required'])){
                                echo $errors['name-required'];
                            }
                        ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12">
                        <label for="exampleInputPassword1">Gender</label>
                        <select name="gender" class="form-control" id="exampleInputPassword1">
                            <option <?php if($_SESSION['user']['gender'] == 'm'){echo 'selected';} ?> value="m">Male</option>
                            <option <?= ($_SESSION['user']['gender'] == 'f' ? 'selected' : '')  ?>  value="f">Female</option>
                        </select>
                        <?php 
                            if(isset($errors['gender-required'])){
                                echo $errors['gender-required'];
                            }
                        ?>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark form-control">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once "layouts/footer.php";
?>