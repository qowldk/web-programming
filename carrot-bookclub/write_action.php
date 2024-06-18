<?php
$connect = mysqli_connect("localhost", "root", "jew64415442!", "postdb") or die("fail");

$writer = $_POST['name'];                   //Writer
$pw = $_POST['pw'];                     //Password
$title = $_POST['title'];               //Title
$content = $_POST['content'];           //Content
$date = date('Y-m-d H:i:s');            //Date

$URL = './index.php';                   //return URL


$query = "INSERT INTO board (title, content, date, hit, password, likes, author) 
        values('$title', '$content', '$date', 0, '$pw', 0, 'jaewoo')";


$result = $connect->query($query);
if ($result) {
?> <script>
alert("<?php echo "게시글이 등록되었습니다." ?>");
location.replace("<?php echo $URL ?>");
</script>
<?php
} else {
    echo "게시글 등록에 실패하였습니다.";
}

mysqli_close($connect);
?>