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
    <section class="mx-5 my-5">

        <form method="post">

            <div class="form-group">
                <label class="col-form-label" for="name">name</label>
                <input type="text" name="name" value="<?= $clientName; ?>" class="form-control py-4" required>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="email">email</label>
                <input type="email" name="email" value="<?= $clientEmail; ?>" class="form-control py-4" required>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="location">client address</label>

                <select name="location" id="location" class="form-control py-4">
                    <?php foreach ($addresses as $address) : ?>
                        <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" name="save" class="btn btn-primary btn-lg py-3 px-5 mt-4"><?= $btnName; ?></button>
        </form>
    </section>
    <!-- main container | start -->
</main>
<?php include_once "includes/footer.php"; ?>