<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/dbcon.php";
?>

<head>
    <title>로그인</title>
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
</head>


<div>
    <div class="navbar">
        <div class="nav-container">
            <div class=logos>
                <a href="/course/index.php">당근북클럽</a>
            </div>
            <div class="function">
                <a href="/course/sell.php">책 판매</a>
                <a href="/course/items.php">책 구매</a>

                <a href="/course/cart.php">장바구니</a>
                <a href="/course/board.php">소통게시판</a>
                <a href="/course/mypage.php">내 정보</a>
            </div>
            <div class="login">
                <a href="/course/member/login.php">로그인</a>
                <a href="/course/member/signup.php">회원가입</a>
            </div>
        </div>
    </div>
    <form class="login-container" method="post" action="/course/member/login_ok.php">
        <h2 class="logo">당근북클럽</h2>
        <div class="col-12">
            <h3 for="validationCustom02" class="form-label">아이디</h3>
            <input type="text" class="input-id" id="userid" name="userid" placeholder="아이디" required>
        </div>
        <div class="col-12">
            <h3 for="validationCustom02" class="form-label">비밀번호</h3>
            <input type="password" class="input-pw" id="passwd" name="passwd" placeholder="비밀번호" required>
        </div>

        <div class="login-btn-wrapper">
            <button class="login-btn" type="submit">로그인</button>
        </div>
    </form>
    <?php
?>

</div>