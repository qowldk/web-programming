<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/components/header.php";

$bid=$_GET["bid"];
$result = $mysqli->query("select * from board where bid=".$bid) or die("query error => ".$mysqli->error);
$rs = $result->fetch_object();
?>



<head>
    <title>당근북클럽 - 게시판</title>
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/boardView.css" rel="stylesheet">
</head>

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
                <a href="/course/mypage.php">내 정보</a>
            </div>
            <div class="login">
                <a href="/course/member/login.php">로그인</a>
                <a href="/course/member/signup.php">회원가입</a>
            </div>
        </div>
    </div>

    <div class="blog-post">
        <div>
            <h2 class="blog-post-title"><?php echo $rs->subject;?></h2>
            <div class="blog-post-meta">작성일: <?php echo $rs->regdate;?> </div>
            <div>작성자: <a href="#"><?php echo $rs->userid;?></a></div>
        </div>
        <hr>
        <div class="blog-content">
            <?php echo $rs->content;?>
        </div>





        <div class="like">

            <div class="like-button" onclick="location.href='/course/boardLike.php?bid=<?php echo $rs->bid;?>'">🥕
                <div class="like-count"> <?php echo $rs->likes;?></div>
            </div>



            <nav class="blog-pagination" aria-label="Pagination">
                <a class="btn-function" href="/course/board.php">목록</a>
                <a class="btn-function" href="/course/write.php?parent_id=<?php echo $rs->bid;?>">답글</a>
                <a class="btn-function" href="/course/write.php?bid=<?php echo $rs->bid;?>">수정</a>
                <a class="btn-function" href="/course/delete.php?bid=<?php echo $rs->bid;?>">삭제</a>
            </nav>
        </div>

    </div>


</body>