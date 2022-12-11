<?php

function createUser($conn, $firstname, $lastname, $email, $password)
{
    $sql = "INSERT INTO users(`id`, `first_name`, `last_name`, `email`,`password`) VALUES(NULL, :firstname, :lastname, :email, :password) ";

    $stmt = $conn->prepare($sql);


    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);

    return $stmt->execute();
}

function getUserByEmail($conn, $email, $column = "*")
{
    $sql = "SELECT $column FROM users WHERE email = :email";

    $stmt = $conn->prepare($sql);


    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

function resetPassword($conn, $id, $newPassword)
{
    $sql = "UPDATE users SET password = :password WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);

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
