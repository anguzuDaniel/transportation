<?php include_once "includes/header.php"; ?>

<?php
require_once "functions/Auth.php";
require_once "functions/User.php";

$conn = getConn();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (authenticateUser($conn, $email, $password)) {
        login();

        header("Location: ./admin/index.php");
    } else {
        $errors = "Incorrect username/password, Please enter correct details";
    }
}

$link = 'signup.php';
$link_name = "Sign up";
?>

<?php require_once "includes/navigation.php"; ?>

<!-- main container | start -->
<section class="login-wrapper">

    <div class="mx-auto" style="width: 400px;">

        <form method="post" class="my-4 p-5 bg-light">
            <h1 class="display-1 mb-5">Login</h1>
            <div class="form-group mb-3">
                <label for="email" class="col-form-label mb-3">Email</label>
                <input type="email" name="email" required class="form-control  py-4 px-4" placeholder="Email">
            </div>

            <div class="form-group mb-3">
                <label for="password" class="col-form-label mb-3">Password</label>
                <input type="password" name="password" class="form-control py-4 px-4" required placeholder="Password">
            </div>

            <p class="p"><a href="resetPassword.php">Forgot password?</a></p>

            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-out-primary py-3 px-5 w-100 my-3">login</button>
        </form>
    </div>
</section>
<!-- main container | start -->

<?php include_once "includes/footer.php"; ?>