<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/components/header.php";

if(!$_SESSION['UID']){
    echo "<script>alert('회원 전용 게시판입니다.');history.back();</script>";
    exit;
}

$bid=$_GET["bid"];
$result = $mysqli->query("select * from board where bid=".$bid) or die("query error => ".$mysqli->error);
$rs = $result->fetch_object();

// 좋아요 버튼을 누른 사용자의 아이디를 가져옵니다.
session_start();
$userid = $_SESSION["UID"];

// board_like 테이블로  좋아요를 이미 눌렀는지 확인합니다.
$result = $mysqli->query("select * from board_like where board_id=".$bid." and user_id='".$userid."'") or die("query error => ".$mysqli->error);
$rs2 = $result->fetch_object();

// 이미 좋아요를 눌렀다면 boardView.php로 돌아갑니다.
if ($rs2 != null) {
    
    echo "<script>alert('이미 좋아요를 누르셨습니다.');</script>";
    echo "<script>location.href='/course/boardView.php?bid=".$bid."';</script>";
    exit;
}

// 좋아요 수 증가
$like = $rs->likes + 1;

// board 테이블의 like 필드를 $like 값으로 변경합니다.
$mysqli->query("update board set likes=".$like." where bid=".$bid) or die("query error => ".$mysqli->error);

// board_like 테이블에 board_id와 user_id 넣기
$sql = "insert into board_like (board_id, user_id) values (".$bid.", '".$userid."')";
$mysqli->query($sql) or die("query error => ".$mysqli->error);


// 좋아요를 눌렀다고 출력하고 boardView.php로 돌아가기
echo "<script>alert('좋아요를 누르셨습니다.');</script>";
echo "<script>location.href='/course/boardView.php?bid=".$bid."';</script>";
exit;
?>