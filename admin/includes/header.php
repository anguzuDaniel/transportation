<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    session_start();
    require_once "../config/dbConfig.php";
    require_once "includes/init.php";
    require_once "../functions/Auth.php";
    requireLogin();

    ?>
    <main class="admin-wrapper">
