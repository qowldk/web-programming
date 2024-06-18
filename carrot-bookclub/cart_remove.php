<?php

include $_SERVER["DOCUMENT_ROOT"] . "/course/dbcon.php";

$conn = mysqli_connect($host, $username, $password, $dbname);

// GET 요청으로부터 받은 데이터를 가져옵니다.
$id = $_GET['id']; // 아이템 ID

// 장바구니 테이블에서 아이템을 삭제하는 SQL 쿼리를 작성합니다.

$sql = "DELETE FROM cart WHERE id = $id";

// SQL 쿼리를 실행합니다.

if (mysqli_query($conn, $sql)) {
    // 아이템 삭제가 성공한 경우에 대한 응답을 설정합니다.
    $response = array(
        'status' => 'success',
        'message' => 'Item removed from cart successfully.'
    );
    
    // 홈으로 이동
    echo "<script>alert('장바구니에서 삭제되었습니다.'); location.href='/course/cart.php';</script>";
    
} else {
    // 아이템 삭제가 실패한 경우에 대한 응답을 설정합니다.
    $response = array(
        'status' => 'error',
        'message' => 'Failed to remove item from cart.'
    );
}
?>