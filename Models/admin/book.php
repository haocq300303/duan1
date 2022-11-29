<?php
require "Models/db.php";

function getAllBook() {
    $sql = "SELECT * FROM book";
    $result = getData($sql, 'FETCH_ALL');
    return $result;
}

function deleteBook($id) {
    $sql = "DELETE FROM book WHERE id='$id';ALTER TABLE categories AUTO_INCREMENT= '$id';";
    getData($sql,'');
}

function getOneProduct($id) {
    $sql = "SELECT * FROM rooms WHERE id='$id'";
    $result = getData($sql, 'FETCH_ONE');
    return $result;
}
?>