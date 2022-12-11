<?php include_once "includes/header.php"; ?>

<?php
$conn = getConn();

$clients = getAllClients($conn);

$orders = getAllOrders($conn);
?>

<!-- header navigation | start -->
<?php include_once "includes/navigation.php"; ?>
<!-- header navigation | end -->

<!-- main container | start -->
<section>
    <h1 class="display-1 font-weight-bold">All clients</h1>

    <section class="conatainer">
        <div class="table-responsive my-5">
            <table border="1" width="100%" class="table bg-light table-striped p-5">
                <thead class="font-weight-bold">
                    <tr>
                        <td scope="col" class="py-5 pl-4">id</td>
                        <td scope="col" class="py-5 pl-4">name</td>
                        <td scope="col" class="py-5 pl-4">email</td>
                        <td scope="col" class="py-5 pl-4">location</td>
                        <td colspan="2" scope="col" class="py-5 pl-4">operations</td>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($clients as $client) : ?>
                        <tr>
                            <td scope="row" class="py-5 pl-4 pl-4"><?= $client['id']; ?></td>
                            <td scope="row" class="py-5 pl-4 pl-4"><?= $client['name']; ?></td>
                            <td scope="row" class="py-5 pl-4 pl-4"><?= $client['email']; ?></td>
                            <td scope="row" class="py-5 pl-4 pl-4"><?= $client['state_name']; ?></td>
                            <td scope="row" class="py-5 pl-4 pl-4"><a href="editClient.php?id=<?= $client['id']; ?>" class="btn text-success fs-4 btn-lg" role="button"><em class="fa-regular fa-pen-to-square"></em></a></td>
                            <td scope="row" class="py-5 pl-4 pl-4"><a href="deleteClient.php?id=<?= $client['id']; ?>" class="btn text-danger fs-4 btn-lg" role="button"><em class="fa-regular fa-trash-can"></em></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</section>
<!-- main container | start -->
<?php include_once "includes/footer.php"; ?>