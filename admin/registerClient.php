<?php include_once "includes/header.php"; ?>

<?php

$conn = getConn();

$clients = getAllClients($conn);

// gets all the states from the database
$addresses = getAllAddresses($conn);

$clientName = "";
$clientEmail = "";
$clientLocation = "";


if (isset($_POST['save'])) {
    $clientName = $_POST['name'];
    $clientEmail = $_POST['email'];
    $clientLocation = $_POST['location'];

    $stmt = addClient($conn, $clientName, $clientEmail, $clientLocation);

    if (!$stmt) {
        $conn->errorInfo();
    } else {

        header("Location: showClients.php");
    }
}

$btnName = "register client";


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
                <input type="text" name="name" value="<?= $clientName; ?>" required>
            </div>

            <div>
                <label for="email">email</label>
                <input type="email" name="email" value="<?= $clientEmail; ?>" required>
            </div>

            <div>
                <label for="location">client address</label>

                <select name="location" id="location">
                    <?php foreach ($addresses as $address) : ?>
                        <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" name="save" class="btn btn-primary btn-lg"><?= $btnName; ?></button>
        </form>
    </section>
    <!-- main container | start -->
</main>
<?php include_once "includes/footer.php"; ?>