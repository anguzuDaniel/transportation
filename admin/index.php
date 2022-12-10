<?php include_once "includes/header.php"; ?>

<?php
require_once "../functions/Search.php";

$conn = getConn();

$clients = getAllClients($conn);

$orders = getAllOrders($conn);


if (isset($_POST['search'])) {
    $tag = $_POST['search_tags'];

    $searchResult = searchTags($conn, $tag);
}

?>

<main>
    <!-- header navigation | start -->
    <?php include_once "includes/navigation.php"; ?>
    <!-- header navigation | end -->

    <!-- main container | start -->
    <section class="conatainer">
        <h1 class="heading heading--primary">Dashboard</h1>

        <!-- card displaying number -->
        <?php include_once "includes/cards.php"; ?>
        <!-- card displaying number -->

        <section class="conatainer">


            <form method="post" class="search">
                <input type="search" name="search_tags" placeholder="search using key words">
                <button type="submit" name="search">search</button>
            </form>
            <div class="search_result">
                <?php if (empty($searchResult)) : ?>
                    <p>No results with that tag, Search using a valid tag.</p>
                <?php else : ?>
                    <ul>
                        <?php foreach ($searchResult as $result) : ?>
                            <li><?= $result['name']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <table border="1" width="100%" class="table table">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>Ordered by</td>
                        <td>order</td>
                        <td>size</td>
                        <td>description</td>
                        <td>depature</td>
                        <td>Arrival</td>
                        <td>collection Address</td>
                        <td>delivery Address</td>
                        <td colspan="2">operations</td>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td><?= $order['id']; ?></td>
                            <td><?= $order['client']; ?></td>
                            <td><?= $order['name']; ?></td>
                            <td><?= $order['size']; ?></td>
                            <td><?= $order['description']; ?></td>
                            <td><?= $order['time_of_departure']; ?></td>
                            <td><?= $order['time_of_arrival']; ?></td>
                            <td><?= $order['collection_address']; ?></td>
                            <td><?= $order['state_name']; ?></td>
                            <td><a href="editOrder.php?id=<?= $order['id']; ?>">edit</a></td>
                            <td><a href="deleteOrder.php?id=<?= $order['id']; ?>">delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </section>
    <!-- main container | start -->
</main>
<?php include_once "includes/footer.php"; ?>