<?php
    require "Models/db.php";

    function getAllCategory() {
        $sql = "SELECT * FROM categories";
        $result = getData($sql, 'FETCH_ALL');
        return $result;
    }

    function insertCategory($name, $image, $desc) {
        $sql = "INSERT INTO categories VALUES (null, '$name', '$image', '$desc')";
        getData($sql, '');
    }

    function getOneCategory($id) {
        $sql = "SELECT * FROM categories WHERE id='$id'";
        $result = getData($sql, 'FETCH_ONE');
        return $result;
    }

    function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id='$id';ALTER TABLE categories AUTO_INCREMENT= '$id';";
        getData($sql,'');
    }

    function updateCategory($id, $name, $image, $desc) {
        $sql = "UPDATE categories SET name='$name', image='$image', description='$desc' WHERE id='$id'";
        getData($sql,'');
    }
?>