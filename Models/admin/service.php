<?php
    require "Models/db.php";

    function getAllService() {
        $sql = "SELECT * FROM service";
        $result = getData($sql, 'FETCH_ALL');
        return $result;
    }

    function insertService($name, $price, $desc, $id_room) {
        $sql = "INSERT INTO service VALUES (null, '$name', '$price', '$desc', '$id_room')";
        getData($sql, '');
    }

    function getOneService($id) {
        $sql = "SELECT * FROM service WHERE id='$id'";
        $result = getData($sql, 'FETCH_ONE');
        return $result;
    }

    function deleteService($id) {
        $sql = "DELETE FROM service WHERE id='$id';ALTER TABLE categories AUTO_INCREMENT= '$id';";
        getData($sql,'');
    }

    function updateService($id, $name, $price, $desc, $id_room) {
        $sql = "UPDATE service SET name='$name', price='$price', description='$desc', id_room='$id_room' WHERE id='$id'";
        getData($sql,'');
    }

    function getOneProduct($id) {
        $sql = "SELECT * FROM rooms WHERE id='$id'";
        $result = getData($sql, 'FETCH_ONE');
        return $result;
    }

    function getAllProduct() {
        $sql = "SELECT * FROM rooms";
        $result = getData($sql, 'FETCH_ALL');
        return $result;
    }
?>