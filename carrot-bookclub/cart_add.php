<?php
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

// 장바구니 테이블에 아이템을 추가하는 SQL 쿼리를 작성합니다.
$sql = "INSERT INTO cart (item_name, user_id, item_id, quantity, price, image_url, seller) VALUES ('$item_name', '$user_id', '$item_id', 1, '$price', '$image_url', '$seller')";

// SQL 쿼리를 실행합니다.
if (mysqli_query($conn, $sql)) {
    // 아이템 추가가 성공한 경우에 대한 응답을 설정합니다.
    $response = array(
        'status' => 'success',
        'message' => 'Item added to cart successfully.'
    );
    
    // 홈으로 이동
    echo "<script>alert('장바구니에 담겼습니다.'); location.href='/course/cart.php';</script>";
    
} else {
    // 아이템 추가가 실패한 경우에 대한 응답을 설정합니다.
    $response = array(
        'status' => 'error',
        'message' => 'Failed to add item to cart.'
    );
}
?>