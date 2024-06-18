<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/signup.css" rel="stylesheet">
    <title>회원가입</title>
</head>

<body>
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
    <div class="container" style="margin:auto;padding:20px;">
        <div class="logo">회원가입</div>
        <form class="form" method="post" action="/course/member/signup_ok.php">
            <div class="form-name">
                <h3 for="username" class="label-name">이름</h3>
                <input type="text" class="input-name" id="username" name="username" placeholder="홍길동" required>
            </div>
            <div class="form-id">
                <h3 for="id" class="label-id">아이디</h3>
                <input type="text" class="input-id" id="userid" name="userid" placeholder="ｈｏｎｇ" required>
            </div>
            <div class="form-password">
                <h3 for="password" class="label-password">비밀번호</h3>
                <input type="password" class="input-password" id="passwd" name="passwd" placeholder="영문,숫자 조합 8자리 이상"
                    required>
            </div>
            <div class="form-email">
                <h3 for="email" class="label-email">이메일</h3>
                <input type="email" class="input-email" id="email" name="email" placeholder="example@gmail.com"
                    required>
            </div>

            <div class="signup-btn-wrapper">
                <button class="signup-btn" type="submit">가입하기</button>
            </div>
        </form>

    </div>
</body>

</html>