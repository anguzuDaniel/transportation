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
        <h1 class="heading heading--primary">Dashboard</h1>

        <!-- card displaying number -->
        <?php include_once "includes/cards.php"; ?>
        <!-- card displaying number -->

        <section class="conatainer">

            <table border="1" width="100%">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>name</td>
                        <td>email</td>
                        <td>location</td>
                        <td colspan="2">operations</td>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($clients as $client) : ?>
                        <tr>
                            <td><?= $client['id']; ?></td>
                            <td><?= $client['name']; ?></td>
                            <td><?= $client['email']; ?></td>
                            <td><?= $client['state_name']; ?></td>
                            <td><a href="editClient.php?id=<?= $client['id']; ?>">edit</a></td>
                            <td><a href="deleteClient.php?id=<?= $client['id']; ?>">delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </section>
    <!-- main container | start -->
</main>
<?php include_once "includes/footer.php"; ?>