<?php include_once "includes/header.php"; ?>

<!-- main container | start -->
<section class="conatainer">
    <h1 class="heading heading--primary">Change Password</h1>

    <form action="" method="post">

        <div>
            <label for="size">email</label>
            <input type="email" name="size" id="size" required>
        </div>

        <div>
            <label for="size">new password</label>
            <input type="password" name="size" id="size" required>
        </div>

        <button type="submit" name="submit">change password</button>
    </form>

    <a href="index.php">back to login</a>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>