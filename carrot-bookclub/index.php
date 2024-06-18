<!DOCTYPE html>
<html>

<head>
    <title>당근북클럽</title>
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
</head>


<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/dbcon.php";
// "items" 테이블에서 데이터 가져오기
$sql = "SELECT * FROM items";

// 쿼리 실행
$result = mysqli_query($mysqli, $sql);

// 결과를 배열로 변환
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);

session_start();
if (isset($_SESSION["UID"])) $userid = $_SESSION["UID"];
// $userid = $_SESSION['UID'];



$sql = "select * from board where 1=1";
$sql .= " and status=1";
$sql .= $search_where;
$order = " order by bid desc";
$query = $sql.$order;
//echo "query=>".$query."<br>";
$result = $mysqli->query($query) or die("query error => ".$mysqli->error);
$count = 5;
$idx = 0;
while($rs = $result->fetch_object()){
    $idx += 1;
    $rsc[]=$rs;

    if ($idx == $count) break;
}


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
        <div class="tag-wrapper">
            <div class="hot-items-text">

                <div class="hot-items-title"> 태그 모음</div>
                <div class="hot-items-desc">추천 태그</div>
                <div class="tag-container">
                    <div class="tag" onclick="location.href='/course/items.php?tag=전체'">
                        <div class="tag-name">전체</div>
                    </div>
                    <div class="tag" onclick="
                        location.href='/course/items.php?tag=컴공'">
                        <div class="tag-name">컴공</div>
                    </div>

                    <div class="tag" onclick="location.href='/course/items.php?tag=기계'">
                        <div class="tag-name">기계</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=전전통'">

                        <div class="tag-name">전전통</div>
                    </div>
                    <div class="tag" onclick="
                        location.href='/course/items.php?tag=메카'
                            ">
                        <div class="tag-name">메카</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=에신화'">
                        <div class="tag-name">에신화</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=디공'">
                        <div class="tag-name">디공</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=산경'">
                        <div class="tag-name">산경</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=고용'">
                        <div class="tag-name">고용</div>
                    </div>
                    <div class="tag" onclick="location.href='/course/items.php?tag=기타'">
                        <div class="tag-name">기타</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="main-shot"><img src="./image/main_screen.png" width="1300px" height="900px"></div>
        <?php
        $sql = "SELECT * FROM totalItems ORDER BY created_at DESC LIMIT 3";
        $result = mysqli_query($mysqli, $sql);
        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>

        <div class="hot-items">
            <div class="hot-items-text">
                <div class="hot-items-title"> 지금 뜨는 책</div>
                <div class="hot-items-desc">인기 글</div>
            </div>
            <div class="item-container">
                <?php foreach ($items as $item) { ?>
                <form class="item" method="post" action="/course/cart_add.php">
                    <div class="item-card">
                        <input type="hidden" value="<?php echo $item["image_url"]; ?>" name="image_url">
                        <img src=<?php echo $item["image_url"]; ?> alt="Item 1">
                        <div class="item-info">
                            <input readonly class="item-name" value=<?php echo $item["name"]?>>
                            <div class="item-desc">
                                <?php echo $item["description"] ?>
                            </div>
                            <input name="price" class="item-price"
                                value=<?php echo "".number_format($item["price"])."원" ?>>
                            <input type="hidden" name="user_id" value=<?php echo $_SESSION["UID"] ?>>
                            <button type="submit" name="id" value=<?php echo $item["id"]; ?>>Buy Now</button>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>






        <!-- <div>
            <img src="./image/banner.jpg" alt="banner" class="banner">
        </div> -->
    </div>


    </div>


</body>

</html>