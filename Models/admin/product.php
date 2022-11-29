<?php
    require "Models/db.php";
    function getAllProduct() {
        $sql = "SELECT * FROM rooms";
        $result = getData($sql, 'FETCH_ALL');
        return $result;
    }

    function insertProduct($name, $image, $price, $desc, $id_category) {
        $sql = "INSERT INTO rooms VALUES (null, '$name', '$image', '$price', '$desc', '$id_category')";
        getData($sql, '');
    }

    function getOneProduct($id) {
        $sql = "SELECT * FROM rooms WHERE id='$id'";
        $result = getData($sql, 'FETCH_ONE');
        return $result;
    }

    function deleteProduct($id) {
        $sql = "DELETE FROM rooms WHERE id='$id';ALTER TABLE categories AUTO_INCREMENT= '$id';";
        getData($sql,'');
    }

    function updateProduct($id, $name, $image, $price, $desc, $id_category) {
        $sql = "UPDATE rooms SET name='$name', image='$image', price='$price', description='$desc', id_category='$id_category' WHERE id='$id'";
        getData($sql,'');
    }

    function getAllCategory() {
        $sql = "SELECT * FROM categories";
        $result = getData($sql, 'FETCH_ALL');
        return $result;
    }
?>
