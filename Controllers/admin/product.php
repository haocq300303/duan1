<?php
require "Models/admin/product.php";
$act = isset($_GET['act']) ? $_GET['act'] : "";
$categories = getAllCategory();
switch ($act){
    case 'add':
        $VIEW = "Views/admin/product/add.php";
        break;
    case 'edit':
        if(isset($_GET['idEdit'])) {
            $idEdit = $_GET['idEdit'];
            $row = getOneProduct($idEdit);
        }
        $VIEW = "Views/admin/product/edit.php";
        break;
    default:
        if(isset($_GET['idDelete'])) {
            $idDelete = $_GET['idDelete'];
            deleteProduct($idDelete);
        }
        $result = getAllProduct();
        $VIEW = "Views/admin/product/main.php";
        break;
}
?>