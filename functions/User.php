<?php

function createUser($conn, $firstname, $lastname, $email, $password)
{
    $sql = "INSERT INTO users(`id`, `first_name`, `last_name`, `email`,`username`, `password`) VALUES(NULL, :firstname, :lastname, :email, :password) ";

    $stmt = $conn->prepare($sql);


    $p = password_hash($password, PASSWORD_BCRYPT);

    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);

    return $stmt->execute();
}

function authenticateUser($conn, $email, $password)
{
    $sql = 'SELECT * FROM users WHERE email = :email ';

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    $stmt->execute();

    if ($user = $stmt->fetch()) {
        return password_verify($password, $user['password']);
    }
}
