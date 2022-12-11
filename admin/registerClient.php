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

?>

<!-- header navigation | start -->
<?php include_once "includes/navigation.php"; ?>
<!-- header navigation | end -->

<!-- main container | start -->
<section class="">

    <form method="post" class="bg-light p-5 my-5 border">
        <h1 class="display-1 mb-5 font-weight-bold">Register Client</h1>

        <div class="form-group mb-4">
            <label class="col-form-label mb-3" for="name">Name</label>
            <input type="text" name="name" value="<?= $clientName; ?>" class="form-control py-4" required>
        </div>

        <div class="form-group mb-4">
            <label class="col-form-label mb-3" for="email">Email</label>
            <input type="email" name="email" value="<?= $clientEmail; ?>" class="form-control py-4" required>
        </div>

        <div class="form-group mb-4">
            <label class="col-form-label mb-3" for="location">Choose address</label>

            <select name="location" id="location" class="form-control py-4">
                <?php foreach ($addresses as $address) : ?>
                    <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" name="save" class="btn btn-primary btn-lg btn-out-primary py-3 px-5 mt-4">Register client</button>
    </form>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>