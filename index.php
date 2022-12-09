<?php include_once "includes/header.php"; ?>

<?php
require_once "functions/Auth.php";
require_once "functions/User.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['name'];

    $user = authenticateUser($conn, $email, $password);
}

?>

<!-- main container | start -->
<section class="conatainer">
    <h1 class="heading heading--primary">Login</h1>

    <form action="" method="post">
        <div>
            <label for="email">email</label>
            <input type="email" name="size" id="size" required>
        </div>

        <div>
            <label for="password">password</label>
            <input type="password" name="size" id="size" required>
        </div>

        <p class="paragraph paragraph--primary"><a href="changePassword.php">Forgot password</a></p>

        <button type="submit" name="submit">login</button>
    </form>

    <a href="signup.php">Sign up</a>
</section>
<!-- main container | start -->

<?php include_once "includes/footer.php"; ?>