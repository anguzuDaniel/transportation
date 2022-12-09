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
<section class="login_wrapper">
    <h1 class="heading heading--primary">Login</h1>

    <form action="" method="post">
        <div>
            <label for="email">email</label>
            <input type="email" name="email" id="size" required>
        </div>

        <div>
            <label for="password">password</label>
            <input type="password" name="password" id="size" required>
        </div>

        <p class="paragraph paragraph--primary"><a href="changePassword.php">Forgot password</a></p>

        <button type="submit" name="submit" class="btn btn--primary">login</button>
    </form>

    <a href="signup.php">Sign up</a>
</section>
<!-- main container | start -->

<?php include_once "includes/footer.php"; ?>