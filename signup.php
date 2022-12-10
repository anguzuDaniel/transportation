<?php include_once "includes/header.php"; ?>

<?php
require_once "functions/Auth.php";
require_once "functions/User.php";

$conn = getConn();

if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = createUser($conn, $firstName, $lastName, $email, $password);

    if (!$stmt) {
        $conn->errorInfo();
    } else {
        header("Location: index.php");
    }
}

?>

<!-- main container | start -->
<section class="login-wrapper">

    <div class="mx-auto" style="width: 300px;">
        <h1 class="h1 mb-3">Sign up</h1>

        <form method="post">
            <div class="form-group">
                <label for="first_name">first name</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="last_name">last name</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg btn-out-primary">Sign up</button>
        </form>

        <a href="index.php">login</a>
    </div>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>