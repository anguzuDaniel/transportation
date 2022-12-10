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


<!-- header navigation | start -->
<?php include_once "includes/navigation.php"; ?>
<!-- header navigation | end -->

<!-- main container | start -->
<section class="mx-5">
    <h1 class="display-1 my-5 font-weight-bold">Dashboard</h1>

    <!-- card displaying number -->
    <?php include_once "includes/cards.php"; ?>
    <!-- card displaying number -->

    <section class="conatainer">
        <div>
            <?php require_once "includes/navigation.php"; ?>

            <div class="table-responsive my-5">
                <table id="dtBasicExample" class="table bg-light"  width="100%">
                    <thead>
                        <tr>
                            <td scope="col" class="py-4">id</td>
                            <td scope="col" class="py-4">Ordered by</td>
                            <td scope="col" class="py-4">order</td>
                            <td scope="col" class="py-4">size</td>
                            <td scope="col" class="py-4">description</td>
                            <td scope="col" class="py-4">depature</td>
                            <td scope="col" class="py-4">Arrival</td>
                            <td scope="col" class="py-4">collection Address</td>
                            <td scope="col" class="py-4">delivery Address</td>
                            <td colspan="2" scope="col" class="py-4">operations</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td scope="row" class="py-4"><?= $order['id']; ?></td>
                                <td scope="row" class="py-4"><?= $order['client']; ?></td>
                                <td scope="row" class="py-4"><?= $order['name']; ?></td>
                                <td scope="row" class="py-4"><?= $order['size']; ?></td>
                                <td scope="row" class="py-4"><?= $order['description']; ?></td>
                                <td scope="row" class="py-4"><?= $order['time_of_departure']; ?></td>
                                <td scope="row" class="py-4"><?= $order['time_of_arrival']; ?></td>
                                <td scope="row" class="py-4"><?= $order['collection_address']; ?></td>
                                <td scope="row" class="py-4"><?= $order['state_name']; ?></td>
                                <td scope="row" class="py-4" style="tex-align: center;"><a href="editOrder.php?id=<?= $order['id']; ?>" class="btn btn-primary btn-lg"><em class="fa-regular fa-pen-to-square"></em></a></td>
                                <td scope="row" class="py-4"><button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#deleteModal"><em class="fa-regular fa-trash-can"></em></button></td>
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
                        <?php endforeach; ?>
                        <!-- delete modal -->
                    </tbody>
                </table>


            </div>
        </div>
    </section>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>