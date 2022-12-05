<?php
require "Models/db.php";

function getAllCategory() {
    $sql = "SELECT * FROM categories";
    $result = getData($sql, 'FETCH_ALL');
    return $result;
}

function getAllProductForCate($idProduct) {
    $sql = "SELECT * FROM rooms WHERE id_category='$idProduct'";
    $result = getData($sql, 'FETCH_ALL');
    return $result;
}

function getOneProduct($id) {
    $sql = "SELECT * FROM rooms WHERE id='$id'";
    $result = getData($sql, 'FETCH_ONE');
    return $result;
}

function insertFeedback($content, $id_user, $id_room) {
    $sql = "INSERT INTO feedback(content, id_user, id_room) VALUES ('$content', '$id_user', '$id_room')";
    getData($sql, '');
}
function getAllFeedbackForRoom($idRoom) {
    $sql = "SELECT * FROM feedback WHERE id_room='$idRoom'";
    $result = getData($sql, 'FETCH_ALL');
    return $result;
}


function insertUser($fullname, $email, $password, $role) {
    $sql = "INSERT INTO users VALUES (null, '$fullname', '$email', '$password', '$role')";
    getData($sql, '');
    $sqlGetUser = "SELECT * FROM users WHERE email='".$email."' AND password='".$password."'";
    $result = getData($sqlGetUser, 'FETCH_ONE');
    return $result;
}

function checkuser($email, $password){
    $sql = "SELECT * FROM users WHERE email='".$email."' AND password='".$password."'";
    $user = getData($sql, 'FETCH_ONE');
    return $user;
}

function getOneUser($id) {
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = getData($sql, 'FETCH_ONE');
    return $result;
}

function loadAllServiceForRoom($id_room) {
    $sql = "SELECT * FROM service WHERE id_room='$id_room'";
    $result = getData($sql, 'FETCH_ALL');
    return $result;
}

function insertBook($fullname, $phone, $email, $vocher, $checkin_date, $checkout_date, $total_price, $status) {
    $sql = "INSERT INTO book VALUES (null, '$fullname', '$phone', '$email', '$vocher', '$checkin_date', '$checkout_date', '$total_price', '$status')";
    $id_book = insertAndGetId($sql);
    return $id_book;
}

function insertDetaiBook ($id_room, $id_book, $price) {
    $sqlDtail = "INSERT INTO detail_book VALUES (null, '$id_room', '$id_book', '$price')";
    getData($sqlDtail, '');
}

function checkBooking($id_room, $checkin_date, $checkout_date){
    $checkin = str_split($checkin_date, 10);
    $checkout = str_split($checkout_date, 10);
    $sql = "SELECT * FROM book LEFT JOIN detail_book ON detail_book.id_book=book.id WHERE detail_book.id_room='$id_room' AND checkin_date >= '$checkin[0]' AND checkout_date <= '$checkout[0]' ";
    $book = getData($sql, 'FETCH_ONE');
    return $book;
}

function getAllProduct() {
    $sql = "SELECT * FROM rooms";
    $result = getData($sql, 'FETCH_ALL');
    return $result;
}

function getAllSlider() {
    $sql = "SELECT * FROM slider";
    $result = getData($sql, 'FETCH_ALL');
    return $result;
}

function getPassword($email){
    $sql = "SELECT * FROM users WHERE email='$email'";
    $user = getData($sql, 'FETCH_ONE');
    return $user;
}
?>
