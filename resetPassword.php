<?php include_once "includes/header.php"; ?>

<?php
require_once "functions/User.php";

$conn = getConn();

$email = "";


if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $users = getUserByEmail($conn, $email);

    if (!$users) {
        echo '<p class="alert alert-danger alert-dismissible fade show">User not found, Please enter a vaild email address.</p>';
    } else {

        foreach ($users as $u) {
            $id = $u['id'];
        }

        header("Location: changePassword.php?id=" . $id);
    }
}

?>

<!-- main container | start -->
<section class="login-wrapper">
    <div class="mx-auto" style="width: 400px;">
        <form method="post" class="my-4 p-5 bg-light">
            <h1 class="display-1 mb-5">Enter your email</h1>

            <div class="form-group mb-4">
                <label for="email" class="col-form-label mb-3">Email</label>
                <input type="email" name="email" class="form-control py-4 px-4" required placeholder="Email">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block btn-out-primary py-3 px-5 w-100 my-4">change password</button> <a href="index.php">Back to login</a>
        </form>
    </div>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>