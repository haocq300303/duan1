<?php
    require "Models/db.php";

    function getAllFeedback() {
        $sql = "SELECT * FROM feedback";
        $result = getData($sql, 'FETCH_ALL');
        return $result;
    }

    function deleteFeedback($id) {
        $sql = "DELETE FROM feedback WHERE id='$id';ALTER TABLE feedback AUTO_INCREMENT= '$id';";
        getData($sql,'');
    }

    function getOneUser($id) {
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = getData($sql, 'FETCH_ONE');
        return $result;
    }

    function getOneProduct($id) {
        $sql = "SELECT * FROM rooms WHERE id='$id'";
        $result = getData($sql, 'FETCH_ONE');
        return $result;
    }
?>