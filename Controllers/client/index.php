<?php
    require "Models/client/index.php";
    $page = isset($_GET["page"]) ? $_GET["page"] : "";
    $categories = getAllCategory();
    $sliders = getAllSlider();
    switch ($page) {
        case "collections":
            $result = $categories;
            $VIEW = "collections.php";
            break;
        case "products":
            if (isset($_GET['idProduct'])) {
            $idProduct = $_GET['idProduct'];
            $productsForCate = getAllProductForCate($idProduct);
            }
            $VIEW = "products.php";
            break;
        case "detail":
            if (isset($_GET['idDetail'])) {
                $idDetail = $_GET['idDetail'];
                $row = getOneProduct($idDetail);
            }
            $VIEW = "detail.php";
            break;
        case "checkout":
            if(isset($_GET['deleteId'])) {
                session_start();
                $index = $_GET['deleteId'];
                unset($_SESSION['cart'][$index]);
                header("Location: ?page=checkout");
            }
            $VIEW = "checkout.php";
            break;
        case "news":
            $VIEW = "news.php";
            break;
        case "introduce":
            $VIEW = "introduce.php";
            break;
        case "payment":
            $VIEW = "payment.php";
            break;
        default:
            $products = getAllProduct();
            $VIEW = "home.php";
            break;
    }
    require "Views/client/layout.php";
?>
