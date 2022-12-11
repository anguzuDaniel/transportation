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
<section>
    <h1 class="display-1 font-weight-bold">Dashboard</h1>

    <!-- card displaying number -->
    <?php include_once "includes/cards.php"; ?>
    <!-- card displaying number -->

    <section class="conatainer">
        <div>
            <?php require_once "includes/navigation.php"; ?>

            <div class="table-responsive my-5">

                <table id="dtBasicExample" class="table bg-light table-striped" width="100%">
                    <thead>
                        <tr>
                            <td scope="col" class="py-5">Order by</td>
                            <td scope="col" class="py-5">order</td>
                            <td scope="col" class="py-5">size</td>
                            <td scope="col" class="py-5">description</td>
                            <td scope="col" class="py-5">depature</td>
                            <td scope="col" class="py-5">Arrival</td>
                            <td scope="col" class="py-5">Pick up</td>
                            <td scope="col" class="py-5">Drop off</td>
                            <td colspan="2" scope="col" class="py-5">operations</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($orders)) : ?>
                            <tr>
                                <td scope="row" class="py-5" colspan="9" class="center-text">No orders added yet..</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td scope="row" class="py-5"><?= $order['client_name']; ?></td>
                                    <td scope="row" class="py-5"><?= $order['name']; ?></td>
                                    <td scope="row" class="py-5"><?= $order['size']; ?></td>
                                    <td scope="row" class="py-5"><?= $order['description']; ?></td>
                                    <td scope="row" class="py-5"><?= $order['time_of_departure']; ?></td>
                                    <td scope="row" class="py-5"><?= $order['time_of_arrival']; ?></td>
                                    <td scope="row" class="py-5"><?= $order['collection_address']; ?></td>
                                    <td scope="row" class="py-5"><?= $order['state_name']; ?></td>
                                    <td scope="row" class="py-5"><a href="editOrder.php?id=<?= $order['id']; ?>" class="btn text-success fs-4 btn-lg"><em class="fa-regular fa-pen-to-square"></em></a></td>
                                    <td scope="row" class="py-5"><a href="deleteOrder.php?id=<?= $order['id']; ?>" class="btn text-danger fs-4 btn-lg" data-toggle=" modal" data-target="#deleteModal"><em class="fa-regular fa-trash-can"></em></a></td>
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
                        <?php endif; ?>
                        <!-- delete modal -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>