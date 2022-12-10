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
        header("Location: showOrders.php");
    }
}
?>

<main>
    <!-- header navigation | start -->
    <?php include_once "./includes/navigation.php"; ?>
    <!-- header navigation | end -->

    <section class="mx-5 my-5">
        <form method="post">
            <div class="form-group col-sm">
                <label class="col-form-label" for="client_name">Client name</label>
                <select name="client_name" id="" class="form-control px-4 py-4" required>
                    <?php foreach ($clients as $client) : ?>
                        <option value="<?= $client['id']; ?>"><?= $client['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="row mb-5">
                <div class="form-group col-sm">
                    <label class="col-form-label" for="name">Name</label>
                    <input type="text" name="name" id="name" required class="form-control px-4 py-4">
                </div>

                <div class="form-group col-sm">
                    <label class="col-form-label" for="size">Size</label>
                    <input type="text" name="size" id="size" class="form-control px-4 py-4" required>
                </div>
            </div>

            <div class="row mb-5">
                <div class="form-group col-sm">
                    <label class="col-form-label" for="departure_time">Departure time</label>
                    <input type="date" name="departure_time" id="size" class="form-control px-4 py-4" required>
                </div>

                <div class="form-group col-sm">
                    <label class="col-form-label" for="arrival_time">Arrival time</label>
                    <input type="date" name="arrival_time" id="description" class="form-control px-4 py-4" required>
                </div>
            </div>

            <div class="row mb-5">
                <div class="form-group col-sm">
                    <label class="col-form-label" for="collection_address">Collection address</label>
                    <select name="collection_address" class="form-control px-4 py-4">
                        <?php foreach ($addresses as $address) : ?>
                            <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-sm">
                    <label class="col-form-label" for="delivery_address">delivery address</label>
                    <select name="delivery_address" class="form-control px-4 py-4">
                        <?php foreach ($addresses as $address) : ?>
                            <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                            <div class="dropdown-divider"></div>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group col-sm">
                <label class="col-form-label" for="description">description</label>
                <textarea name="description" id="" cols="30" row="10" class="form-control px-4 py-4" required style="resize: none;"></textarea>
            </div>

            <button type="submit" name="save" class="btn btn-primary btn-lg py-3 px-5 mt-4">submit order</button>
        </form>
    </section>
</main>

<?php include_once "includes/footer.php"; ?>