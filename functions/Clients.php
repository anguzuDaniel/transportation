<?php
function addClient($conn, $name, $email, $location)
{
    $sql = "INSERT INTO clients(`id`, `name`, `email`, `location`) VALUES (NULL, :name, :email, :location) ";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':location', $location, PDO::PARAM_INT);

    $stmt->execute();
}

/**
 * getAllClients
 *
 * @param  mixed $conn
 * @param  mixed $column
 * @return array
 */
function getAllClients($conn, $column = '*')
{
    $sql = "SELECT $column FROM clients";

    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
