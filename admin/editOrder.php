<?php require_once "includes/header.php"; ?>

<?php
require_once "../functions/Clients.php";
require_once "../functions/Orders.php";
require_once "../functions/Address.php";

$conn = getConn();

$clients = getAllClients($conn);

// gets all the states from the database
$addresses = getAllAddresses($conn);


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $order = getOrderById($conn, $id);

    if (!$order) {
        echo "No order with that id";
    }
}

if (isset($_POST['save'])) {
    $orderName = $_POST['name'];
    $orderSize = $_POST['size'];
    $description = $_POST['description'];
    $departureTime = $_POST['departure_time'];
    $arrivalTime = $_POST['arrival_time'];
    $clientName = $_POST['client_name'];
    $collectionAddress = $_POST['collection_address'];
    $deliveryAddress = $_POST['delivery_address'];

    $stmt = updateOrder($conn, $id, $orderName, $orderSize, $description, $departureTime, $arrivalTime, $clientName, $collectionAddress, $deliveryAddress);

    if (!$stmt) {
        echo "Order was not updated successfully, please try again later.";
    } else {
        header("Location: index.php");
    }
}
?>

<!-- header navigation | start -->
<?php include_once "./includes/navigation.php"; ?>
<!-- header navigation | end -->

<section class="mx-5 my-5">
    <h1 class="display-1 my-5 font-weight-bold">Edit Order</h1>

    <form method="post" class="bg-light p-5">

        <?php foreach ($order as $o) : ?>
            <label class="col-form-label" for="client_name">client name</label>
            <select name="client_name" class="form-control py-4 px-4" required>
                <?php foreach ($clients as $client) : ?>
                    <option value="<?= $client['id']; ?>"><?= $client['name']; ?></option>
                <?php endforeach; ?>
            </select>

            <div class="row mb-5">
                <div class="form-group col-sm">
                    <label class="col-form-label" for="name">Name</label>
                    <input class="form-control py-4 px-4" type="text" name="name" id="name" required value="<?= $o['name']; ?>">
                </div>

                <div class="form-group col-sm">
                    <label class="col-form-label" for="size">Size</label>
                    <input class="form-control py-4 px-4" type="text" name="size" id="size" required value="<?= $o['size']; ?>">
                </div>
            </div>

            <div class="row mb-5">
                <div class="form-group col-sm">
                    <label class="col-form-label" for="departure_time">departure time</label>
                    <input class="form-control py-4 px-4" type="date" name="departure_time" id="size" required value="<?= $o['time_of_departure']; ?>">
                </div>

                <div class="form-group col-sm">
                    <label class="col-form-label" for="arrival_time">arrival time</label>
                    <input class="form-control py-4 px-4" type="date" name="arrival_time" id="description" required value="<?= $o['time_of_arrival']; ?>">
                </div>
            </div>

            <div class="row mb-5">
                <div class="form-group col-sm">
                    <label class="col-form-label" for="collection_address">collection address</label>
                    <select name="collection_address" class="form-control py-4 px-4">
                        <option value="<?= $o['collection_address']; ?>"><?= $o['collection_address']; ?></option>
                        <?php foreach ($addresses as $address) : ?>
                            <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-sm">
                    <label class="col-form-label" for="delivery_address">delivery address</label>
                    <select name="delivery_address" class="form-control py-4 px-4">
                        <option value="<?= $o['delivery_address']; ?>"><?= $o['delivery_address']; ?></option>
                        <?php foreach ($addresses as $address) : ?>
                            <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row mb-5">
                <div class="form-group col-sm">
                    <label class="col-form-label" for="description">description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control py-4 px-4" required style="resize: none;"><?= $o['description']; ?></textarea>
                </div>
            </div>

            <button type="submit" name="save" class="btn btn--primary">edit order</button>
        <?php endforeach; ?>
    </form>
</section>
<?php include_once "includes/footer.php"; ?>