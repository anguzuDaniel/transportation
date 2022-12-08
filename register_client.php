<?php include_once "includes/header.php"; ?>

<?php
require_once "functions/Clients.php";
require_once "functions/Orders.php";
require_once "functions/Address.php";

$conn = getConn();

$clients = getAllClients($conn);

// gets all the states from the database
$addresses = getAllAddresses($conn);

if (isset($_Post['submit'])) {
    $orderName = $_Post['name'];
    $clientEmail = $_Post['email'];
    $clientLocation = $_Post['location'];


    $client = addClient($conn, $clientName, $clientEmail, $clientLocation);

    if (!$client) {
        echo "Client was not add successfully, Please try again later";
    } else {
        header("Location: clients.php");
    }
}
?>

<main>
    <!-- header navigation | start -->
    <?php include_once "includes/navigation.php"; ?>
    <!-- header navigation | end -->

    <!-- main container | start -->
    <section class="conatainer">

    
        <form action="" method="post">

            <div>
                <label for="name">name</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div>
                <label for="size">email</label>
                <input type="email" name="size" id="size" required>
            </div>

            <div>
                <label for="collection_address">client address</label>
                <select name="collection_address">
                    <?php foreach ($addresses as $address) : ?>
                        <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" name="submit">create client</button>
        </form>
    </section>
    <!-- main container | start -->
</main>
<?php include_once "includes/footer.php"; ?>