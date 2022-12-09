<?php
function addClient($conn, $name, $email, $location)
{
    $sql = "INSERT INTO clients(`id`, `name`, `email`, `location`) VALUES (NULL, :name, :email, :location) ";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':location', $location, PDO::PARAM_INT);

    return $stmt->execute();
}

function editClient($conn, $name, $email, $location, $id)
{
    $sql = "UPDATE clients 
            SET name = :name, 
            email = :email, 
            location = :location
            WHERE id = :id ";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':location', $location, PDO::PARAM_INT);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
}

function deleteClient($conn, $id)
{
    $sql = "DELETE FROM clients WHERE id = :id ";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
}

/**
 * getAllClients
 *
 * @param  mixed $conn
 * @param  mixed $column
 * @return array
 */
function getAllClients($conn)
{
    $sql = "SELECT c.id, c.name, c.email, c.location, s.name as state_name
            FROM clients AS c 
            INNER JOIN states AS s 
            ON c.id = s.id";

    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

function getAllClientById($conn, $id)
{
    $sql = "SELECT c.id, c.name, c.email, c.location, s.name as state_name
            FROM clients AS c 
            INNER JOIN states AS s 
            ON c.id = s.id
            WHERE c.id = :id ";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->setFetchMode(PDO::FETCH_ASSOC)) {
        return $stmt->fetch();
    }
}
