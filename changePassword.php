<?php include_once "includes/header.php"; ?>


<!-- main container | start -->
<section class="login-wrapper">

    <div class="mx-auto" style="width: 400px;">
        <h1 class="h1">Change Password</h1>

        <form method="post" class="my-4">

            <div class="form-group">
                <label for="size" class="col-form-label">Email</label>
                <input type="email" name="size" class="form-control py-4 px-4" required placeholder="Email">
            </div>

            <div class="form-group">
                <label for="size" class="col-form-label">New password</label>
                <input type="password" name="size" class="form-control py-4 px-4" required placeholder="Create new password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block btn-out-primary py-3 px-5 w-100 mt-4">change password</button>
        </form>

        <a href="index.php">back to login</a>
    </div>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>