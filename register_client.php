<?php include_once "includes/header.php"; ?>
<!-- header navigation | start -->
<?php include_once "includes/navigation.php"; ?>
<!-- header navigation | end -->

<!-- main container | start -->
<section class="conatainer">
    <form action="" method="post">

        <div>
            <label for="name">name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="size">email</label>
            <input type="email" name="size" id="size" required>
        </div>

        <div>
            <label for="collection_address">client address</label>
            <select name="collection_address" id="">
                <option value="">Michigan</option>
            </select>
        </div>

        <button type="submit" name="submit">create client</button>
    </form>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>