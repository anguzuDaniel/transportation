<?php

function getAllAddresses($conn)
{
    $sql = "SELECT * FROM states";

    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
