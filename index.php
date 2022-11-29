<?php
$url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
const FILE_PATH = 'http://localhost/duan1/Views/asset/';
const URL = "http://localhost/duan1/";
switch ($url){
    case "/admin":
        include "Controllers/admin/index.php";
        break;
    default:
        include "Controllers/client/index.php";
        break;
}
?>