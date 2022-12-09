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

                        <td>size</td>

                        <td>description</td>

                        <td>collection Address</td>

                        <td>delivery Address</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>id</td>

                        <td>name</td>

                        <td>size</td>

                        <td>description</td>

                        <td>collection Address</td>

                        <td>delivery Address</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>
    <!-- main container | start -->
</main>
<?php include_once "includes/footer.php"; ?>