<?php

class Order
{
    /**
     * id
     *
     * @var mixed
     */
    public $id;

    /**
     * name
     *
     * @var mixed
     */
    /**
     * name
     *
     * @var mixed
     */
    public $name;

    /**
     * size
     *
     * @var mixed
     */
    public $size;

    /**
     * description
     *
     * @var mixed
     */
    public $description;

    /**
     * dateOfDeparture
     *
     * @var mixed
     */
    public $dateOfDeparture;

    /**
     * dateOfArrival
     *
     * @var mixed
     */
    public $dateOfArrival;
    
    /**
     * collectionAddress
     *
     * @var mixed
     */
    public $collectionAddress;
    
    /**
     * deliveryAddress
     *
     * @var mixed
     */
    public $deliveryAddress;

    /**
     * createOrder
     *
     * @param  mixed $conn
     * @param  mixed $name
     * @param  mixed $size
     * @param  mixed $description
     * @param  mixed $dateOfDeparture
     * @param  mixed $dateOfArrival
     * @param  mixed $collectionAddress
     * @param  mixed $deliveryAddress
     * @return array
     */
    public function createOrder($conn, $name, $size, $description, $dateOfDeparture, $dateOfArrival, $collectionAddress, $deliveryAddress)
    {
        $sql = "INSERT INTO `transportation`.`orders`(`id`,`name`,`size`,`description`,`time_of_departure`,`time_of_arrival`,`collection_address`,`delivery_address`)
        VALUES (NULL, :name, :size, :description, :time_of_departure, :time_of_arrival, :collection_address, :delivery_address ) ";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':size', $size, PDO::PARAM_INT);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':time_of_departure', $dateOfDeparture, PDO::PARAM_STR);
        $stmt->bindValue(':time_of_arrival', $dateOfArrival, PDO::PARAM_STR);
        $stmt->bindValue(':collection_address', $collectionAddress, PDO::PARAM_STR);
        $stmt->bindValue(':delivery_address', $deliveryAddress, PDO::PARAM_STR);

        return $stmt->execute();
    }

    
    /**
     * deleteOrder
     *
     * @param  mixed $conn
     * @param  mixed $id
     * @return void
     */
    public function deleteOrder($conn, $id)
    {
        $sql = "DELETE FROM orders WHERE id = :id ";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }
}
