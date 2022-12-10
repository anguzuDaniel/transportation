<?php include_once "includes/header.php"; ?>

<?php

$conn = getConn();

$clients = getAllClients($conn);

// gets all the states from the database
$addresses = getAllAddresses($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = getAllClientById($conn, $id);

    if (!$row) {
        echo "Client doesn't exist";
    }
}

if (isset($_POST['save'])) {
    $clientName = $_POST['name'];
    $clientEmail = $_POST['email'];
    $clientLocation = $_POST['collection_address'];

    $stmt = updateClient($conn, $clientName, $clientEmail, $clientLocation, $id);

    if (!$stmt) {
        $stmt->errorInfo();
    } else {
        $id = $_POST['id'];

        header("Location: showClients.php");
    }
}


$btnName = "Edit client";
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
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            </div>

            <div>
                <label for="email">email</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>

            <div>
                <label for="collection_address">client address</label>

                <select name="collection_address" id="location">
                    <option value="<?= $row['location']; ?>" selected><?= $row['state_name']; ?></option>
                    <?php foreach ($addresses as $address) : ?>
                        <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" name="save" class="btn btn--primary"><?php echo $btnName; ?></button>
        </form>

    </section>
    <!-- main container | start -->
</main>
<?php include_once "includes/footer.php"; ?>