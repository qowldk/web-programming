<?php
include $_SERVER["DOCUMENT_ROOT"]."/course/dbcon.php";

$userid=$_POST["userid"];
$name = $_POST["title"];
$price = $_POST["price"];
$tag = $_POST["tag"];
$desc = $_POST["content"];
$picture = $_POST["fileToUpload"];
$sellerId = $_POST["seller"];
$picture = $_POST["imgURL"];
$date = date("Y-m-d");


$sql = "INSERT INTO totalItems (name, description, price, image_url, created_at, tag, sellerId) VALUES ('$name', '$desc', '$price', '$picture', '$date' ,'$tag', '$sellerId')";
$result = mysqli_query($mysqli, $sql);

if($result){
    echo "<script>alert('물건이 등록되었습니다.'); location.href='/course/index.php';</script>";
}else{
    echo "<script>alert('물건 등록에 실패했습니다.'); history.back();</script>";
}
?>