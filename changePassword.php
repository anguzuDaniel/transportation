<?php include_once "includes/header.php"; ?>

<?php
require_once "functions/User.php";

$conn = getConn();

$email = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


if (isset($_POST['submit'])) {
    $password = $_POST['password'];

    $result = resetPassword($conn, $id, $password);

    if (!$result) {
        echo '<p class="alert alert-danger alert-dismissible fade show">Unable to reset password right now, please try again later.</p>';
    } else {
        echo '<p class="alert alert-success alert-dismissible fade show">Password reset successful, you can now login.</p>';
    }
}

?>

<!-- main container | start -->
<section class="login-wrapper">
    <div class="mx-auto" style="width: 400px;">
        <form method="post" class="my-4 p-5 bg-light">
            <h1 class="display-1 mb-5">Reset Password</h1>

            <div class="form-group mb-4">
                <label for="password" class="col-form-label mb-3">New password</label>
                <input type="password" name="password" class="form-control py-4 px-4" required placeholder="Create new password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block btn-out-primary py-3 px-5 w-100 my-4">change password</button>
            <a href="index.php">Back to login</a>
        </form>

    </div>
</section>
<!-- main container | start -->

<?php include_once "includes/footer.php"; ?>