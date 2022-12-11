<?php include_once "includes/header.php"; ?>


<!-- main container | start -->
<section class="login-wrapper">

    <div class="mx-auto" style="width: 400px;">

        <form method="post" class="my-4 p-5 bg-light">
            <h1 class="display-1 mb-5">Reset Password</h1>

            <div class="form-group mb-4">
                <label for="size" class="col-form-label mb-3">Email</label>
                <input type="email" name="size" class="form-control py-4 px-4" required placeholder="Email">
            </div>

            <div class="form-group mb-4">
                <label for="size" class="col-form-label mb-3">New password</label>
                <input type="password" name="size" class="form-control py-4 px-4" required placeholder="Create new password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block btn-out-primary py-3 px-5 w-100 my-4">change password</button>
            <a href="index.php">Back to login</a>
        </form>

    </div>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>