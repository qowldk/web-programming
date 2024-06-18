<!DOCTYPE html>
<html>

<head>
    <title>당근북클럽 - 장바구니</title>
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/cart.css" rel="stylesheet">
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!-- iamport.payment.js -->
    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.2.0.js"></script>
    <script>
    var IMP = window.IMP;
    IMP.init("imp68825158");

    function requestPay(item) {
        console.log("click", item)
        IMP.request_pay({
                pg: "kakaopay.TC0ONETIME",
                pay_method: "card",
                // 현재 시간으로 아이디 생성
                merchant_uid: `${new Date().getTime()}`,
                name: `${item.item_name}`,
                amount: `${item.item_price}}`,
                buyer_email: "당근북클럽@chai.finance",
                buyer_name: "당근북클럽 기술지원팀",
                buyer_tel: "010-1234-5678",
                buyer_addr: "충절로 1600, 한국기술교육대학교",
                buyer_postcode: "123-456",
            },
            function(rsp) {
                if (rsp.success) {
                    console.log(rsp)
                    // 결제 성공 시: 결제 승인 또는 가상계좌 발급에 성공한 경우
                    // http://localhost/course/paymentinfo.php에 POST 요청

                    jQuery.ajax({
                        url: "http://localhost/course/paymentinfo.php", // 가맹점 서버
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                        },
                        data: {
                            imp_uid: rsp.imp_uid,
                            merchant_uid: rsp.merchant_uid,

                        },
                        success: function(response) {
                            console.log(response)
                            alert("결제가 완료되었습니다.");
                            // http://localhost/course/cart_remove.php로 이동
                            location.href = `http://localhost/course/cart_remove.php?id=${item.id};`


                        },
                        error: function(response) {
                            console.log(response)
                            alert("실패");
                        },
                        // 결제 취소
                        cancel: function(response) {
                            console.log(response)
                            alert("결제가 취소되었습니다.");
                            // http://localhost/course/cart.php로 이동
                            location.href = "http://localhost/course/cart.php";

                        },
                    });


                } else {
                    // 결제 실패 시 로직,
                    var msg = '결제에 실패하였습니다.';
                    msg += '에러내용 : ' + rsp.error_msg;
                    alert(msg);
                }



            });

    }
    </script>
</head>


<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/dbcon.php";

// 유저 아이디 가져오기
session_start();
$userid = $_SESSION['UID'];

// "items" 테이블에서 데이터 가져오기
$sql = "SELECT * FROM cart";

// 쿼리 실행
$result = mysqli_query($mysqli, $sql);

// 결과를 배열로 변환
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);



?>


<body>
    <div class="navbar">
        <div class="nav-container">
            <div class=logo>
                <a href="/course/index.php">당근북클럽</a>
            </div>
            <div class="function">
                <a href="/course/sell.php">책 판매</a>
                <a href="/course/items.php">책 구매</a>

                <a href="/course/cart.php">장바구니</a>
                <a href="/course/board.php">소통게시판</a>
                <a href="/course/hotboard.php">인기 게시판</a>
                <a href="/course/mypage.php">내 정보</a>
            </div>
            <div class="login">

                <?php if (!isset($_SESSION['UID'])) { ?>
                <a href="/course/member/login.php">로그인</a>
                <a href="/course/member/signup.php">회원가입</a>
                <?php } else { ?>
                <a href="/course/member/logout.php">로그아웃</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="title">🛒 <span id="userid"><?= $userid ?></span>님의
            장바구니 </div>
        <?php if (count($items) == 0) { ?>
        <div class="empty">
            <div>장바구니가 <span id="hl">텅!</span> 비어있습니다. 😱</div>


            <a id="goItems" href="/course/items.php">책 구매하러 가기</a>

        </div>
        <?php } ?>
        <div class="item-container">



            <?php foreach ($items as $item) { ?>
            <div class="item-card">

                <img src=<?php echo $item["image_url"]; ?> alt="Item">
                <div class="item-name"><?php echo $item["item_name"]; ?></div>
                <div class="item-price"><?php echo $item["price"]; ?></div>
                <div class="item-seller"> 판매자 <?php echo $item["seller"]; ?></div>


                <button onclick="requestPay({
                    item_name: '<?php echo $item["item_name"]; ?>',
                    item_price: '<?php echo $item["price"]; ?>',
                    id: '<?php echo $item["id"]; ?>',
                    })">구매하기</button>

                <button onclick="location.href='/course/cart_remove.php?id=<?php echo $item["id"]; ?>'">Remove</button>

            </div>

            <?php } ?>


        </div>

    </div>
    </div>


    </div>

    <div class="footer">
        <div class="footer-container">
            &copy; <?php echo date("Y"); ?>All rights reserved.
        </div>
    </div>
</body>

</html>