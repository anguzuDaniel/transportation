<?php include_once "includes/header.php"; ?>

<?php

$conn = getConn();

$clients = getAllClients($conn);

// gets all the states from the database
$addresses = getAllAddresses($conn);

if (isset($_POST['register_client'])) {
    $clientName = $_POST['name'];
    $clientEmail = $_POST['email'];
    $clientLocation = $_POST['collection_address'];

    var_dump($_POST);

    $client = addClient($conn, $clientName, $clientEmail, $clientLocation);

    if (!$client) {
        $conn->errorInfo();
    } else {
        header("Location: clients_display.php");
    }
}
?>

<main>
    <!-- header navigation | start -->
    <?php include_once "includes/navigation.php"; ?>
    <!-- header navigation | end -->

    <!-- main container | start -->
    <section class="conatainer">


        <form method="post">

            <div>
                <label for="name">name</label>
                <input type="text" name="name" required>
            </div>

            <div>
                <label for="email">email</label>
                <input type="email" name="email" required>
            </div>

            <div>
                <label for="location">client address</label>

                <select name="location" id="location">
                    <?php foreach ($addresses as $address) : ?>
                        <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" name="register_client">register client</button>
        </form>
    </section>
    <!-- main container | start -->
</main>
<?php include_once "includes/footer.php"; ?>