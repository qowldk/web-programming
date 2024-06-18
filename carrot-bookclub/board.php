<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/components/header.php";

$search_keyword = $_GET['search_keyword'] ?? '';

$sql = "SELECT * FROM board WHERE status = 1";
if ($search_keyword) {
    $sql .= " AND (subject LIKE ? OR content LIKE ?)";
}
$sql .= " ORDER BY bid DESC";

// Prepare statement
$stmt = $mysqli->prepare($sql);

if ($search_keyword) {
    $param = '%' . $search_keyword . '%';
    $stmt->bind_param('ss', $param, $param);
}

$stmt->execute();
$result = $stmt->get_result();
$rsc = [];
while ($rs = $result->fetch_object()) {
    $rsc[] = $rs;
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>당근북클럽</title>
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/board.css" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <div class="nav-container">
            <div class="logo">
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
    <h1>소통게시판</h1>
    <div class="board-wrapper">
        <form class="search" method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="search-input">
                <input type="text" class="form-control" name="search_keyword" id="search_keyword" placeholder="제목과 내용에서 검색합니다." value="<?php echo htmlspecialchars($search_keyword); ?>" aria-label="Search">
                <button class="btn" type="submit">검색</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">번호</th>
                    <th scope="col">글쓴이</th>
                    <th scope="col">제목</th>
                    <th scope="col">등록일</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($rsc as $r) {
                    $subject = str_replace($search_keyword, "<span style='color:red;'>".$search_keyword."</span>", $r->subject);
                ?>
                <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $r->userid; ?></td>
                    <td><a class="post" href="/course/boardView.php?bid=<?php echo $r->bid; ?>"><?php echo $subject; ?></a></td>
                    <td><?php echo $r->regdate; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <p style="text-align:right;">
            <?php if ($_SESSION['UID']) { ?>
            <a href="/course/write.php"><button type="button" class="btn-login">등록</button></a>
            <a href="/course/member/logout.php"><button type="button" class="btn-logout">로그아웃</button></a>
            <?php } else { ?>
            <a href="/course/member/login.php"><button type="button" class="btn-login">로그인</button></a>
            <a href="/course/member/signup.php"><button type="button" class="btn-signup">회원가입</button></a>
            <?php } ?>
        </p>
    </div>
</body>
</html>
