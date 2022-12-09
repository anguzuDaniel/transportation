<?php

function searchTags($conn, $tag)
{
    $sql = "SELECT * FROM orders 
            WHERE `name` 
            LIKE :t 
            OR `name` LIKE :t1 
            OR `name` LIKE :t2 ";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(":t", '%' . $tag, PDO::PARAM_STR);
    $stmt->bindValue(":t1", '%' . $tag . '%', PDO::PARAM_STR);
    $stmt->bindValue(":t2", $tag . '%', PDO::PARAM_STR);

    if ($stmt->execute()) {
        return $stmt->fetchAll();
    }
}
