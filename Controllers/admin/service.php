<?php
require "Models/admin/service.php";
$act = isset($_GET['act']) ? $_GET['act'] : "";
$rooms = getAllProduct();
switch ($act){
    case 'add':
        $VIEW = "Views/admin/service/add.php";
        break;
    case 'edit':
        if(isset($_GET['idEdit'])) {
            $idEdit = $_GET['idEdit'];
            $row = getOneService($idEdit);
        }
        $VIEW = "Views/admin/service/edit.php";
        break;
    default:
        if(isset($_GET['idDelete'])) {
            $idDelete = $_GET['idDelete'];
            deleteService($idDelete);
        }
        $result = getAllService();
        $VIEW = "Views/admin/service/main.php";
        break;
}
?>