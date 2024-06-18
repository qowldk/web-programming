<?php
// Path: payment.php
// dbcon.php를 포함시킵니다.
include $_SERVER["DOCUMENT_ROOT"] . "/course/dbcon.php";

$conn = mysqli_connect($host, $username, $password, $dbname);

// POST 요청으로부터 받은 데이터를 가져옵니다.
$item_id = $_POST['id']; // 아이템 ID
$item_name = $_POST['name']; // 아이템 이름
$user_id = $_POST['user_id']; // 사용자 ID
$price = $_POST['price']; // 아이템 가격
$image_url = $_POST['image_url']; // 아이템 이미지 URL
$seller = $_POST['seller']; // 판매자



// 아이템을 구매한 사용자의 잔액을 가져옵니다.
$sql = "SELECT * FROM members WHERE id='$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
$balance = $user['balance'];

// 잔액이 아이템 가격보다 많은지 확인합니다.
if ($balance < $price) {
    echo "<script>alert('잔액이 부족합니다.'); history.back();</script>";
    exit;
}

// 잔액이 아이템 가격보다 많으면 아이템을 구매합니다.
$balance = $balance - $price;
$sql = "UPDATE users SET balance='$balance' WHERE id='$user_id'";
$result = mysqli_query($conn, $sql);

// 구매한 아이템을 items 테이블에서 삭제합니다.
$sql = "DELETE FROM items WHERE id='$item_id'";
$result = mysqli_query($conn, $sql);

// 구매한 아이템을 history 테이블에 추가합니다.
$sql = "INSERT INTO history (item_id, item_name, user_id, price, image_url, seller) VALUES ('$item_id', '$item_name', '$user_id', '$price', '$image_url', '$seller')";
$result = mysqli_query($conn, $sql);

// 구매한 아이템을 cart 테이블에서 삭제합니다.
$sql = "DELETE FROM cart WHERE item_id='$item_id'";
$result = mysqli_query($conn, $sql);




?>