<?php include_once "includes/header.php"; ?>

<!-- header navigation | start -->
<?php include_once "includes/navigation.php"; ?>
<!-- header navigation | end -->

<section class="conatainer">
    <form action="" method="post">

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="size">Size</label>
            <input type="text" name="size" id="size" required>
        </div>

        <div>
            <label for="departure_time">departure time</label>
            <input type="date" name="departure_time" id="size" required>
        </div>

        <div>
            <label for="arrival_time">arrival time</label>
            <input type="date" name="arrival_time" id="description" required>
        </div>

        <div>
            <label for="collection_address">collection address</label>
            <select name="collection_address" id="">
                <option value="">Michigan</option>
            </select>
        </div>

        <div>
            <label for="delivery_address">delivery address</label>
            <select name="delivery_address" id="">
                <option value="">Michigan</option>
            </select>
        </div>

        <div>
            <label for="description">description</label>
            <textarea name="description" id="" cols="30" rows="10" required style="resize: none;"></textarea>
        </div>

        <button type="submit" name="submit">submit order</button>
    </form>
</section>
<?php include_once "includes/footer.php"; ?>