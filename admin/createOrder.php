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

    <section class="conatainer">
        <form method="post">
            <div class="form-group">
                <label for="client_name">client name</label>
                <select name="client_name" id="" class="form-control" required>
                    <?php foreach ($clients as $client) : ?>
                        <option value="<?= $client['id']; ?>"><?= $client['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required class="form-control">
            </div>

            <div class="form-group">
                <label for="size">Size</label>
                <input type="text" name="size" id="size" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="departure_time">departure time</label>
                <input type="date" name="departure_time" id="size" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="arrival_time">arrival time</label>
                <input type="date" name="arrival_time" id="description" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="collection_address">collection address</label>
                <select name="collection_address" id="collection_address" class="form-control">
                    <?php foreach ($addresses as $address) : ?>
                        <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="dropdown">
                <button type="button" class="btn btn-secondary dropdwon-toggle" id="dropdownMenuButton" toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    delivery address
                </button>
                <!-- <label for="delivery_address">delivery address</label> -->
                <select name="delivery_address" class="dropdown-menu" aria-labelledby="dropdownMenuButton" class="form-control">
                    <?php foreach ($addresses as $address) : ?>
                        <option value="<?= $address['id']; ?>" class="dropdown-item"><?= $address['name']; ?></option>
                        <div class="dropdown-divider"></div>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="description">description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control" required style="resize: none;"></textarea>
            </div>

            <button type="submit" name="save" class="btn btn-primary btn-lg">submit order</button>
        </form>
    </section>
</main>

<?php include_once "includes/footer.php"; ?>