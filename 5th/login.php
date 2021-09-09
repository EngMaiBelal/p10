<?php
include_once "layouts/header.php";
include_once "middlewares/guest.php";
include_once "layouts/nav.php";
// login page
// if user is correct => home.php
// if user not authorized => print_error
// for guest users only


// home page
// print user name in the nav bar
// no one access home page with out auhtentication


// profile
// show and edit user data
// no one access home page with out auhtentication

$users = [
    [
        'id' => 1,
        'name' => 'ahmed',
        'email' => 'ahmed@gmail.com',
        'password' => '123456',
        'image' => '1.jpg',
        'gender' => 'm'
    ],
    [
        'id' => 2,
        'name' => 'esraa',
        'email' => 'esraa@gmail.com',
        'password' => '123456',
        'image' => '2.jpg',
        'gender' => 'f'
    ],
    [
        'id' => 3,
        'name' => 'galal',
        'email' => 'galal@gmail.com',
        'password' => '123456',
        'image' => '3.jpg',
        'gender' => 'm'
    ]
];

if ($_POST) {
    // validation
    // email => required 
    $errors = [];
    if (empty($_POST['email'])) {
        $errors['email-required'] = "<div class='alert alert-danger'> Email Is Requried </div>";
    }

    // password => required
    if (empty($_POST['password'])) {
        $errors['password-required'] = "<div class='alert alert-danger'> Password Is Requried </div>";
    }

    if (empty($errors)) {
        $user =  array_filter($users, function ($userDB) {
            return $userDB['email'] == $_POST['email'] and $userDB['password'] == $_POST['password'];
        });
        if (!empty($user)) {
            // save data into session
            $_SESSION['user'] = array_values($user)[0];
            // header to home page
            header('location:home.php');
        }
    }
}

?>



<div class="container mt-5">

    <div class="col-4 offset-4 my-3 h1 text-center text-dark">Login</div>
    <div class="col-4 offset-4">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" value="<?php if (isset($_POST['email'])) {
                                                            echo $_POST['email'];
                                                        } ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                <?php
                if (isset($errors['email-required'])) {
                    echo $errors['email-required'];
                }
                ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <?php
                if (isset($errors['password-required'])) {
                    echo $errors['password-required'];
                }
                if (isset($user) and empty($user)) {
                    echo "<div class='alert alert-danger'> Wrong Email Or Password </div>";
                }
                ?>
            </div>
            <button type="submit" class="btn btn-dark form-control">Login</button>
        </form>
    </div>

</div>

<?php include_once "layouts/footer.php" ?>