<?php
$connect = mysqli_connect('localhost', 'root', '12345678', 'dashboard') or die("connect failed");

$number = $_POST['number'];
$title = $_POST['title'];
$content = $_POST['content'];

$date = date('Y-m-d H:i:s');

$query = "update guestbook set title='$title', content='$content', date='$date' where number=$number";
$result = $connect->query($query);
if ($result) {
    ?>
    <script>
        alert("수정되었습니다.");
        location.replace("guest_read.php?number=<?= $number ?>");
    </script>
<?php } else {
    echo "다시 시도해주세요.";
}
?>