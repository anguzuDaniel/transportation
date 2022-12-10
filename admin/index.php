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
        <h1>Dashboard</h1>

        <!-- card displaying number -->
        <?php include_once "includes/cards.php"; ?>
        <!-- card displaying number -->

        <section class="conatainer">


            <form method="post" class="form-inline my-2 my-lg-0">
                <input type="search" name="search_tags" class="form-control" placeholder="search using key words">
                <button type="submit" name="search" class="btn btn-outline-primary my-2 my-sm-0">search</button>
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

            <div class="table-responsive">
                <table border="1" width="100%" class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <td scope="col">id</td>
                            <td scope="col">Ordered by</td>
                            <td scope="col">order</td>
                            <td scope="col">size</td>
                            <td scope="col">description</td>
                            <td scope="col">depature</td>
                            <td scope="col">Arrival</td>
                            <td scope="col">collection Address</td>
                            <td scope="col">delivery Address</td>
                            <td colspan="2" scope="col">operations</td>
                        </tr>
                    </thead>

                    <tbody class="table-stripped">

                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td scope="row"><?= $order['id']; ?></td>
                                <td scope="row"><?= $order['client']; ?></td>
                                <td scope="row"><?= $order['name']; ?></td>
                                <td scope="row"><?= $order['size']; ?></td>
                                <td scope="row"><?= $order['description']; ?></td>
                                <td scope="row"><?= $order['time_of_departure']; ?></td>
                                <td scope="row"><?= $order['time_of_arrival']; ?></td>
                                <td scope="row"><?= $order['collection_address']; ?></td>
                                <td scope="row"><?= $order['state_name']; ?></td>
                                <td scope="row"><a href="editOrder.php?id=<?= $order['id']; ?>" class="btn btn-primary btn-lg"><em class="fa-regular fa-pen-to-square"></em></a></td>
                                <td scope="row"><button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#deleteModal"><em class="fa-regular fa-trash-can"></em></button></td>
                            </tr>

                            <!-- delete modal -->
                            <div class="modal fade" id="deleteModal" aria-labelledby="deleteModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title" id="deleteModalLabel">Caution!!</h1>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <h2 class="modal-title">Are you sure you want to delete this client?</h2>
                                            <p>Please note changes will not be reversed.</p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                                            <a href="deleteOrder.php?id=<?= $order['id']; ?>" type="button" class="btn btn-primary">delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- delete modal -->
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
    <!-- main container | start -->


</main>
<?php include_once "includes/footer.php"; ?>