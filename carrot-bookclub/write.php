<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/components/header.php";



if(!$_SESSION['UID']){
    echo "<script>alert('회원 전용 게시판입니다.');history.back();</script>";
    exit;
}

$bid=$_GET["bid"];//get으로 넘겼으니 get으로 받는다.
$parent_id=$_GET["parent_id"];

if($bid){//bid가 있다는건 수정이라는 의미다.

    $result = $mysqli->query("select * from board where bid=".$bid) or die("query error => ".$mysqli->error);
    $rs = $result->fetch_object();

    if($rs->userid!=$_SESSION['UID']){
        echo "<script>alert('본인 글이 아니면 수정할 수 없습니다.');history.back();</script>";
        exit;
    }

}

if($parent_id){//parent_id가 있다는건 답글이라는 의미다.

    $result = $mysqli->query("select * from board where bid=".$parent_id) or die("query error => ".$mysqli->error);
    $rs = $result->fetch_object();
    $rs->subject = "[RE]".$rs->subject;
}


?>

<head>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/write.css">

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
    <form method="post" action="/course/write_ok.php">

        <div class="write-wrapper">
            <h1> 글 작성하기</h1>
            <input type="hidden" name="bid" value="<?php echo $bid;?>">
            <input type="hidden" name="parent_id" value="<?php echo $parent_id;?>">
            <div class="write-title">
                <label for="exampleFormControlInput1" class="form-label">제목</label>
                <input type="text" name="subject" class="form-title" id="exampleFormControlInput1"
                    placeholder="제목을 입력하세요." value="<?php echo $rs->subject;?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">내용</label>
                <textarea class="form-content" id="exampleFormControlTextarea1" name="content" placeholder="내용을 입력하세요"
                    rows="3"><?php echo $rs->content;?></textarea>
            </div>
            <button type="submit" class="btn">등록</button>
        </div>
    </form>

</body>