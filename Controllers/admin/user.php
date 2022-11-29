<?php
require "Models/admin/user.php";
$act = isset($_GET['act']) ? $_GET['act'] : "";
switch ($act){
    case 'add':
        $VIEW = "Views/admin/user/add.php";
        break;
    case 'edit':
        if(isset($_GET['idEdit'])) {
            $idEdit = $_GET['idEdit'];
            $row = getOneUser($idEdit);
        }
        $VIEW = "Views/admin/user/edit.php";
        break;
    default:
        if(isset($_GET['idDelete'])) {
            $idDelete = $_GET['idDelete'];
            deleteUser($idDelete);
        }
        $result = getAllUser();
        $VIEW = "Views/admin/user/main.php";
        break;
}
?>