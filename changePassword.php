<?php include_once "includes/header.php"; ?>

<!-- main container | start -->
<!-- main container | start -->
<section class="login-wrapper">

    <div class="login-container">
        <h1 class="heading heading--primary">Change Password</h1>

        <form action="" method="post">

            <div>
                <label for="size" class="col-form-label">email</label>
                <input type="email" name="size" class="form-control" required>
            </div>

            <div>
                <label for="size" class="col-form-label">new password</label>
                <input type="password" name="size" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block btn-out-primary">change password</button>
        </form>

        <a href="index.php">back to login</a>
    </div>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>