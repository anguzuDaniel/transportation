<?php

function addClient($conn, $name, $email, $address)
{
    $sql = "INSERT INTO `transportation`.`orders`(`id`,`name`,`email`,`address``)
    VALUES (NULL, :name, :email, :address) ";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_INT);
    $stmt->bindValue(':address', $address, PDO::PARAM_STR);

    return $stmt->execute();
}

function getAllClients($conn, $column = '*')
{
    $sql = "SELECT $column FROM clients";

    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
