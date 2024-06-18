<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/dbcon.php";
include $_SERVER["DOCUMENT_ROOT"]."/course/components/header.php";

if(!$_SESSION['UID']){
    echo "<script>alert('로그인 먼저 하세요.');history.back();</script>";
    exit;
} else {
    $userid = $_SESSION['UID'];
    // 유저 정보를 가져오는 쿼리문
    $sql = "SELECT * FROM members WHERE userid='$userid'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $email = $row['email'];
    $username = $row['username'];
    $regDate= $row['regdate'];
    
    // 유저 아이디 가져오기
    session_start();

    // "items" 테이블에서 데이터 가져오기
    $sql = "SELECT * FROM cart";

    // 쿼리 실행
    $result = mysqli_query($mysqli, $sql);

    // 결과를 배열로 변환
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
}



?>


<head>
    <title>당근북클럽 - 내 정보</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/sell.css">
    <link rel="stylesheet" href="css/mypage.css">
</head>

<body>
    <div>
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

        <div class="mypage">
            <h1>
                내 정보
            </h1>

            <div class="container">

                <div class="info-container">
                    <div class=" myinfo">
                        <div class="profile_thumb">


                            <img src="https://kream.co.kr/_nuxt/img/blank_profile.4347742.png" alt="사용자 이미지"
                                class="thumb_img" data-v-4b474860="">
                        </div>
                        <div class="myid"> <?php echo $userid?></div>

                    </div>
                    <div class="info-wrapper">
                        <div class="myinfo-detail">
                            <div class="unit">
                                <h5 class="ptitle">프로필 이름</h5>
                                <div class="unit_content">
                                    <p class="desc desc_modify"> qowldk</p>

                                </div>

                            </div>
                        </div>
                    </div>





                </div>
                <div class="cart">

                    <div class="cart-container">
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
                                <div class="item-info-wrapper">
                                    <div class="item-name"><?php echo $item["item_name"]; ?></div>
                                    <div class="item-price"><?php echo $item["price"]; ?>원</div>
                                    <div class="item-seller"> 판매자 <?php echo $item["seller"]; ?></div>
                                </div>
                                <div>
                                    <button onclick="requestPay({
                    item_name: '<?php echo $item["item_name"]; ?>',
                    item_price: '<?php echo $item["price"]; ?>',
                    id: '<?php echo $item["id"]; ?>',
                    })">구매하기</button>

                                    <button
                                        onclick="location.href='/course/cart_remove.php?id=<?php echo $item["id"]; ?>'">Remove</button>
                                </div>

                            </div>

                            <?php } ?>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>