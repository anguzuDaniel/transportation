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

<!-- header navigation | start -->
<?php include_once "includes/navigation.php"; ?>
<!-- header navigation | end -->

<!-- main container | start -->
<section class="mx-5 my-5">

    <form method="post" class="bg-light p-5">
        <h1 class="display-1 mb-5 font-weight-bold">Edit Client</h1>

        <div class="form-group">
            <label for="name" class="col-form-label">name</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control py-4" required>
        </div>

        <div class="form-group">
            <label for="email" class="col-form-label">email</label>
            <input type="email" name="email" class="form-control py-4" value="<?php echo $row['email']; ?>" required>
        </div>

        <div class="form-group">
            <label for="collection_address" class="col-form-label">client address</label>
            <select name="collection_address" id="location" class="form-control py-4">
                <option value=""><?= $row['state_name']; ?></option>
                <?php foreach ($addresses as $address) : ?>
                    <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" name="save" class="btn btn-primary btn-block btn-lg btn-out-primary py-3 px-5 mt-4"><?php echo $btnName; ?></button>
    </form>

</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>