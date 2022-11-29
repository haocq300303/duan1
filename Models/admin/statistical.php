<?php
require "Models/db.php";

function get_all_statistical() {
    $sql = "SELECT categories.id as madm, categories.name as tendm, count(rooms.id) as countsp, min(rooms.price) as minprice,  max(rooms.price) as maxprice, avg(rooms.price) as avgprice";
    $sql.= " FROM rooms LEFT JOIN categories on categories.id = rooms.id_category";
    $sql.= " GROUP BY categories.id ORDER BY categories.id DESC";
    $listtk = getData($sql, 'FETCH_ALL');
    return $listtk;
}
?>
