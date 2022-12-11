<?php require_once "includes/header.php"; ?>

<?php
require_once "../functions/Clients.php";
require_once "../functions/Orders.php";
require_once "../functions/Address.php";

$conn = getConn();

$clients = getAllClients($conn);

// gets all the states from the database
$addresses = getAllAddresses($conn);

if (isset($_POST['save'])) {
    $orderName = $_POST['name'];
    $orderSize = $_POST['size'];
    $description = $_POST['description'];
    $departureTime = $_POST['departure_time'];
    $arrivalTime = $_POST['arrival_time'];
    $clientName = $_POST['client_name'];
    $collectionAddress = $_POST['collection_address'];
    $deliveryAddress = $_POST['delivery_address'];

    $order = createOrder($conn, $orderName, $orderSize, $description, $departureTime, $arrivalTime, $clientName, $collectionAddress, $deliveryAddress);

    if (!$order) {
        echo "Order was not processed, please try again later";
    } else {
        header("Location: index.php");
    }
}
?>


<!-- header navigation | start -->
<?php include_once "./includes/navigation.php"; ?>
<!-- header navigation | end -->

<section class="mx-2 my-2">

    <form method="post" class="bg-light p-5 py-5 my-5 border">
        <h1 class="display-1 mb-5 font-weight-bold">Create Order</h1>

        <div class="form-group col-sm mb-5">
            <label class="col-form-label mb-3" for="client_name">Client name</label>
            <select name="client_name" id="" class="form-control px-4 py-4" required>
                <?php foreach ($clients as $client) : ?>
                    <option value="<?= $client['id']; ?>"><?= $client['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <hr>

        <div class="my-5">
            <div class="row g-3 my-5">
                <div class="form-group col-sm">
                    <label class="col-form-label mb-3" for="name">Name</label>
                    <input type="text" name="name" id="name" required class="form-control px-4 py-4">
                </div>

                <div class="form-group col-sm">
                    <label class="col-form-label mb-3" for="size">Size</label>
                    <input type="text" name="size" id="size" class="form-control px-4 py-4" required>
                </div>
            </div>

            <hr>

            <div class="row g-3 my-5">
                <div class="form-group col-sm">
                    <label class="col-form-label mb-3" for="departure_time">Departure time</label>
                    <input type="date" name="departure_time" id="size" class="form-control px-4 py-4" required>
                </div>

                <div class="form-group col-sm">
                    <label class="col-form-label mb-3" for="arrival_time">Arrival time</label>
                    <input type="date" name="arrival_time" id="description" class="form-control px-4 py-4" required>
                </div>
            </div>

            <div class="row g-3">
                <div class="form-group col-sm">
                    <label class="col-form-label mb-3" for="collection_address">Collection address</label>
                    <select name="collection_address" class="form-control px-4 py-4">
                        <?php foreach ($addresses as $address) : ?>
                            <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-sm">
                    <label class="col-form-label mb-3" for="delivery_address">delivery address</label>
                    <select name="delivery_address" class="form-control px-4 py-4">
                        <?php foreach ($addresses as $address) : ?>
                            <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                            <div class="dropdown-divider"></div>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <hr>

        <div class="form-group col-sm">
            <label class="col-form-label mb-3" for="description">description</label>
            <textarea name="description" id="" cols="30" row g-3="10" class="form-control px-4 py-4" required style="resize: none;"></textarea>
        </div>

        <button type="submit" name="save" class="btn btn-primary btn-lg py-3 px-5 mt-4">submit order</button>
    </form>
</section>
<?php include_once "includes/footer.php"; ?>