<?php include_once "includes/header.php"; ?>

<!-- main container | start -->
<section class="conatainer">
    <h1 class="heading heading--primary">Sign up</h1>

    <form action="" method="post">
        <div>
            <label for="size">first name</label>
            <input type="text" name="size" id="size" required>
        </div>

        <div>
            <label for="size">last name</label>
            <input type="text" name="size" id="size" required>
        </div>

        <div>
            <label for="size">email</label>
            <input type="email" name="size" id="size" required>
        </div>

        <div>
            <label for="size">password</label>
            <input type="password" name="size" id="size" required>
        </div>

        <button type="submit" name="submit">Sign up</button>
    </form>

    <a href="index.php">login</a>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>