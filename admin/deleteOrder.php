<?php include_once "includes/header.php"; ?>

<?php
$conn = getConn();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = deleteOrder($conn, $id);

    if (!$stmt) {
        echo "Something went wrong, please try again";
    } else {
        echo "Client delete from records";

        header("Location: showClients.php");
    }
}
?>

<?php include_once "includes/footer.php"; ?>