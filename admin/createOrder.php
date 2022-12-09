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

            <label for="client_name">client name</label>
            <select name="client_name" id="" required>
                <?php foreach ($clients as $client) : ?>
                    <option value="<?= $client['id']; ?>"><?= $client['name']; ?></option>
                <?php endforeach; ?>
            </select>

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
                <select name="collection_address" id="collection_address">
                    <?php foreach ($addresses as $address) : ?>
                        <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="delivery_address">delivery address</label>
                <select name="delivery_address" id="delivery_address">
                    <?php foreach ($addresses as $address) : ?>
                        <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="description">description</label>
                <textarea name="description" id="" cols="30" rows="10" required style="resize: none;"></textarea>
            </div>

            <button type="submit" name="save">submit order</button>
        </form>
    </section>
</main>

<?php include_once "includes/footer.php"; ?>