<?php
    include $_SERVER["DOCUMENT_ROOT"]."/course/dbcon.php";
    // "items" 테이블에서 데이터 가져오기
    $sql = "SELECT * FROM totalItems";
    
    // 쿼리 실행
    $result = mysqli_query($mysqli, $sql);
    session_start();
    $userid = $_SESSION['UID'];
    
    // 결과를 배열로 변환
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<head>
    <title>당근북클럽 - 책 판매하기</title>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/sell.css">

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

    <div>

        <form method="post" action="/course/sell_ok.php">
            <div class="item-selling">
                <h1>  책 판매하기 </h1>
                <div><img src="./image/logo.jpeg" width="100px" height="100px"></div>

                <input name="userid" type="hidden" value=<?php echo $_SESSION['UID']?>>

                <div class="title">제목</div>
                <input name="title" placeholder="이산수학 책 팝니다">

                <div class="title">내용</div>
                <textarea id="content" name="content" placeholder="컴퓨팅 사고력을 키우는 이산수학 책 팝니다. 깨끗해요"></textarea>

                <div class="title">가격</div>
                <input name="price" placeholder="16,000">

                <div class="title">사진</div>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="text" name="imgURL" id="imgURL" placeholder="이미지 URL">
                <div class="title">태그</div>
                <input type="hidden" name="seller" id="seller" value=<?php echo $userid?>>
                <input type="hidden" name="tag" id="tag" value="전자기기">
                <select id="tag-dropdown">
                    <option value="컴공">컴공</option>
                    <option value="기계">기계</option>
                    <option value="전전통">전전통</option>
                    <option value="메카">메카</option>
                    <option value="에신화">에신화</option>
                    <option value="디공">디공</option>
                    <option value="산경">산경</option>
                    <option value="고용">고용</option>
                    <option value="기타">기타</option>
                </select>
                <button class="add-btn" type="submit">등록</button>

                <script>
                var dropdown = document.getElementById('tag-dropdown');
                dropdown.onchange = function() {
                    var item = dropdown.options[dropdown.selectedIndex].value;
                    document.getElementById("tag").value = item;
                }
                </script>



            </div>
        </form>

    </div>
</body>