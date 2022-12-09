<?php


/**
 * createOrder
 * adds/creates an order in the database
 * 
 * @param  mixed $conn
 * @param  mixed $name
 * @param  mixed $size
 * @param  mixed $description
 * @param  mixed $dateOfDeparture
 * @param  mixed $dateOfArrival
 * @param  mixed $clientName
 * @param  mixed $collectionAddress
 * @param  mixed $deliveryAddress
 * @return $stmt->execute()
 */
function createOrder($conn, $name, $size, $description, $dateOfDeparture, $dateOfArrival, $clientName, $collectionAddress, $deliveryAddress)
{
    $sql = "INSERT INTO orders(`id`, `name`, `size`, `description`, `time_of_departure`, `time_of_arrival`, `client_orders`, `collection_address`, `delivery_address`)
        VALUES (NULL, :name, :size, :description, :time_of_departure, :time_of_arrival, :clientName, :collection_address, :delivery_address ) ";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':size', $size, PDO::PARAM_INT);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':time_of_departure', $dateOfDeparture, PDO::PARAM_STR);
    $stmt->bindValue(':time_of_arrival', $dateOfArrival, PDO::PARAM_STR);
    $stmt->bindValue(':clientName', $clientName, PDO::PARAM_INT);
    $stmt->bindValue(':collection_address', $collectionAddress, PDO::PARAM_STR);
    $stmt->bindValue(':delivery_address', $deliveryAddress, PDO::PARAM_STR);

    return $stmt->execute();
}

function updateOrder($conn, $id, $name, $size, $description, $dateOfDeparture, $dateOfArrival, $clientName, $collectionAddress, $deliveryAddress)
{
    $sql = "UPDATE orders SET name = :orderName, 
        `size` = :orderSize, 
        `description` = :orderDescription, 
        `time_of_departure` = :timeOfDeparture,
        `time_of_arrival` = :timeOfArrival,
        `client_orders` = :clientName,
        `collection_address` = :collectionAddress,
        `delivery_address` = :deliveryAddress 
        WHERE id = :id ";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':orderName', $name);
    $stmt->bindParam(':orderSize', $size);
    $stmt->bindParam(':orderDescription', $description, PDO::PARAM_STR);
    $stmt->bindParam(':timeOfDeparture', $dateOfDeparture, PDO::PARAM_STR);
    $stmt->bindParam(':timeOfArrival', $dateOfArrival, PDO::PARAM_STR);
    $stmt->bindParam(':clientName', $clientName, PDO::PARAM_INT);
    $stmt->bindParam(':collectionAddress', $collectionAddress, PDO::PARAM_INT);
    $stmt->bindParam(':deliveryAddress', $deliveryAddress, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
}

function getAllOrders($conn)
{
    $sql = "SELECT 
            o.id, 
            o.size,
            o.name, 
            o.description, 
            o.time_of_departure, 
            o.time_of_arrival, 
            o.client_orders, 
            o.collection_address, 
            o.delivery_address, 
            s.name AS state_name, 
            c.name AS client 
            FROM orders AS o
            LEFT JOIN clients AS c ON o.id = c.id
            INNER JOIN states AS s ON o.delivery_address = s.id ";

    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


function getOrderById($conn, $id)
{
    $sql = "SELECT * FROM orders
            WHERE id = :id ";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


/**
 * deleteOrder
 *
 * @param mixed $conn
 * @param mixed $id
 * @return void
 */
function deleteOrder($conn, $id)
{
    $sql = "DELETE FROM orders WHERE id = :id ";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
}
