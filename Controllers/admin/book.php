<?php
require "Models/admin/book.php";
$act = isset($_GET['act']) ? $_GET['act'] : "";
switch ($act){
    case 'detail':
        if(isset($_GET['idDetail'])) {
            $idDetail = $_GET['idDetail'];
            $rooms = getAllDetailBook($idDetail);
            $services = [];
        }
        $VIEW = "Views/admin/book/detail.php";
        break;
    default:
        if(isset($_GET['idDelete'])) {
            $idDelete = $_GET['idDelete'];
            deleteBook($idDelete);
        }
        $result = getAllBook();
        $VIEW = "Views/admin/book/main.php";
        break;
}
?>