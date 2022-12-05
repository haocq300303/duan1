<?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    switch ($page){
        case "category":
            require "category.php";
            break;
        case "product":
            require "product.php";
            break;
        case "user":
            require "user.php";
            break;
        case "feedback":
            require "Models/admin/feedback.php";
            $products = getAllProduct();
            if(isset($_GET['idDelete'])) {
                $idDelete = $_GET['idDelete'];
                deleteFeedback($idDelete);
            }
            if(isset($_GET['idRoom'])) {
                $idRoom = $_GET['idRoom'];
                $result = getAllFeedbackForRoom($idRoom);
            } else {
                $result = getAllFeedback();
            }
            $VIEW = "feedback.php";
            break;
        case "book":
            require "book.php";
            break;
        case "service":
            require "service.php";
            break;
        default:
            require "Models/admin/statistical.php";
            $results = get_all_statistical();
            $VIEW = "statistical.php";
            break;
    }
    require "Views/admin/layout.php";
?>