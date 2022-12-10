<?php include_once "includes/header.php"; ?>

<?php
$conn = getConn();

$clients = getAllClients($conn);

$orders = getAllOrders($conn);
?>

<main>
    <!-- header navigation | start -->
    <?php include_once "includes/navigation.php"; ?>
    <!-- header navigation | end -->

    <!-- main container | start -->
    <section class="conatainer">
        <h1 class="h1">Dashboard</h1>

        <!-- card displaying number -->
        <?php include_once "includes/cards.php"; ?>
        <!-- card displaying number -->

        <section class="conatainer">
            <div class="table-responsive">
                <table border="1" width="100%" class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <td scope="col">id</td>
                            <td scope="col">name</td>
                            <td scope="col">email</td>
                            <td scope="col">location</td>
                            <td colspan="2" scope="col">operations</td>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($clients as $client) : ?>
                            <tr>
                                <td scope="row"><?= $client['id']; ?></td>
                                <td scope="row"><?= $client['name']; ?></td>
                                <td scope="row"><?= $client['email']; ?></td>
                                <td scope="row"><?= $client['state_name']; ?></td>
                                <td scope="row"><a href="editClient.php?id=<?= $client['id']; ?>" class="btn btn-primary btn-lg" role="button"><em class="fa-regular fa-pen-to-square"></em></a></td>
                                <td scope="row"><a href="deleteClient.php?id=<?= $client['id']; ?>" class="btn btn-danger btn-lg" role="button"><em class="fa-regular fa-trash-can"></em></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
    <!-- main container | start -->
</main>
<?php include_once "includes/footer.php"; ?>