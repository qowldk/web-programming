<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/components/header.php";

$search_keyword = $_GET['search_keyword'];

if($search_keyword){
    $search_where = " and (subject like '%".$search_keyword."%' or content like '%".$search_keyword."%')";
}

$sql = "select * from board where 1=1";
$sql .= " and status=1";
$sql .= $search_where;
$order = " order by bid desc";
$query = $sql.$order;
//echo "query=>".$query."<br>";
$result = $mysqli->query($query) or die("query error => ".$mysqli->error);
while($rs = $result->fetch_object()){
    $rsc[]=$rs;
}

?>



<head>
    <title>당근북클럽 - 인기 게시판</title>
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/board.css" rel="stylesheet">
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
    <h1>🔥 HOT 게시판</h1>
    <div class="board-wrapper-hot">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">번호</th>
                    <th scope="col">글쓴이</th>
                    <th scope="col">제목</th>
                    <th scope="col">추천수</th>
                    <th scope="col">등록일</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // 추천수 높은 순 정렬
                function cmp($a, $b)
                {
                    if ($a->likes == $b->likes) {
                        return 0;
                    }
                    return ($a->likes > $b->likes) ? -1 : 1;
                }
                usort($rsc, "cmp");
                
                    for($i=0; $i<count($rsc); $i++){
                    if($i==5) break;
                ?>
                <tr>
                    <th scope="row"><?php echo $rsc[$i]->bid?></th>
                    <td><?php echo $rsc[$i]->userid?></td>
                    <td><a class="post"
                            href="/course/boardView.php?bid=<?php echo $rsc[$i]->bid?>"><?php echo $rsc[$i]->subject?></a>
                    </td>
                    <td><?php echo $rsc[$i]->likes?></td>
                    <td><?php echo $rsc[$i]->regdate?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>


        <p style="text-align:right;">

        </p>

    </div>

</body>