<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="../css/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.min.js" defer></script>
</head>

<body>
    <?php
    session_start();
    require_once "../config/dbConfig.php";
    require_once "includes/init.php";
    require_once "../functions/Auth.php";
    requireLogin();
