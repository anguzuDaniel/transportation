<?php include_once "includes/header.php"; ?>

<!-- main container | start -->
<section class="conatainer">
    <h1 class="heading heading--primary">Login</h1>

    <form action="" method="post">
        <div>
            <label for="size">email</label>
            <input type="email" name="size" id="size" required>
        </div>

        <div>
            <label for="size">password</label>
            <input type="password" name="size" id="size" required>
        </div>

        <p class="paragraph paragraph--primary"><a href="change_password.php">Forgot password</a></p>

        <button type="submit" name="submit">login</button>
    </form>

    <a href="signup.php">Sign up</a>
</section>
<!-- main container | start -->

<?php include_once "includes/footer.php"; ?>