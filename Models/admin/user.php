<?php
require "Models/db.php";

function getAllUser() {
    $sql = "SELECT * FROM users";
    $result = getData($sql, 'FETCH_ALL');
    return $result;
}

function insertUser($fullname, $email, $password, $role) {
    $sql = "INSERT INTO users VALUES (null, '$fullname', '$email', '$password', '$role')";
    getData($sql, '');
}

function getOneUser($id) {
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = getData($sql, 'FETCH_ONE');
    return $result;
}

function deleteUser($id) {
    $sql = "DELETE FROM users WHERE id='$id';ALTER TABLE users AUTO_INCREMENT= '$id';";
    getData($sql,'');
}

function updateUser($id, $fullname, $email, $role) {
    $sql = "UPDATE users SET fullname='$fullname', email='$email', role='$role' WHERE id='$id'";
    getData($sql,'');
}
?>