<?php
require "Models/admin/category.php";
$act = isset($_GET['act']) ? $_GET['act'] : "";
switch ($act){
    case 'add':
        $VIEW = "Views/admin/category/add.php";
        break;
    case 'edit':
        if(isset($_GET['idEdit'])) {
            $idEdit = $_GET['idEdit'];
            $row = getOneCategory($idEdit);
        }
        $VIEW = "Views/admin/category/edit.php";
        break;
    default:
        if(isset($_GET['idDelete'])) {
            $idDelete = $_GET['idDelete'];
            deleteCategory($idDelete);
        }
        $result = getAllCategory();
        $VIEW = "Views/admin/category/main.php";
        break;
}
?>