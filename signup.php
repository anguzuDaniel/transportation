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
<section class="conatainer">
    <h1 class="heading heading--primary">Sign up</h1>

    <form method="post">
        <div>
            <label for="first_name">first name</label>
            <input type="text" name="first_name" id="size" required>
        </div>

        <div>
            <label for="last_name">last name</label>
            <input type="text" name="last_name" id="size" required>
        </div>

        <div>
            <label for="email">email</label>
            <input type="email" name="email" id="size" required>
        </div>

        <div>
            <label for="password">password</label>
            <input type="password" name="password" id="size" required>
        </div>

        <button type="submit" name="submit">Sign up</button>
    </form>

    <a href="index.php">login</a>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>