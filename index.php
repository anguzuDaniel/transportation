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

?>

<!-- main container | start -->
<section class="login-wrapper">

    <div class="login-container">
        <h1 class="h1">Login</h1>

        <form method="post">
            <div class="form-group">
                <label for="email" class="col-form-label">email</label>
                <input type="email" name="email" required class="form-control">
            </div>

            <div class="form-group">
                <label for="password" class="col-form-label">password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <p class="paragraph paragraph--primary"><a href="changePassword.php">Forgot password</a></p>

            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block btn-out-primary">login</button>
        </form>

        <a href="signup.php">Sign up</a>
    </div>
</section>
<!-- main container | start -->

<?php include_once "includes/footer.php"; ?>