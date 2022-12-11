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

$link = 'index.php';
$link_name = "login";
?>

<?php require_once "includes/navigation.php"; ?>

<!-- main container | start -->
<section class="login-wrapper">

    <div class="mx-auto" style="width: 400px;">

        <form method="post" class="my-4 p-5 bg-light">
            <h1 class="display-1 mb-5">Sign up</h1>

            <div class="form-group mb-3">
                <label class="col-form-label mb-3" for="first_name">First name</label>
                <input type="text" name="first_name" class="form-control py-4 px-4" required placeholder="First name">
            </div>

            <div class="form-group mb-3">
                <label class="col-form-label mb-3" for="last_name">Last name</label>
                <input type="text" name="last_name" class="form-control py-4 px-4" required placeholder="Last name">
            </div>

            <div class="form-group mb-3">
                <label class="col-form-label mb-3" for="email">Email</label>
                <input type="email" name="email" class="form-control py-4 px-4" required placeholder="Email">
            </div>

            <div class="form-group mb-3">
                <label class="col-form-label mb-3" for="password">Password</label>
                <input type="password" name="password" class="form-control py-4 px-4" required placeholder="Password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg btn-out-primary py-3 px-5 w-100 my-3">Sign up</button>
        </form>


    </div>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>