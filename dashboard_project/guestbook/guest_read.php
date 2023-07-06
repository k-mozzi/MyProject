<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="guest_read_style.css">
</head>
<body>
<?php
$connect = mysqli_connect('localhost', 'root', '12345678', 'dashboard');
$number = $_GET['number'];  // GET 방식 사용
session_start();
$query = "select title, content, date, hit, id from guestbook where number = $number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$hit = "update guestbook set hit = hit + 1 where number = $number";
$connect->query($hit);

if (isset($_SESSION['userid'])) {
    ?><b><?php echo $_SESSION['userid']; ?></b>님 반갑습니다.
    <button onclick="location.href='guest_logout_action.php'" style="float:right; font-size:15.5px;">로그아웃</button>
    <br />
    <?php
} else {
    ?>
    <button onclick="location.href='guest_login.php'" style="float:right; font-size:15.5px;">로그인</button>
    <br />
    <?php
}
?>

<table class="read_table" align=center>
    <tr>
        <td colspan="4" class="read_title"><?php echo $rows['title'] ?></td>
    </tr>
    <tr>
        <td class="read_id">작성자</td>
        <td class="read_id2"><?php echo $rows['id'] ?></td>
        <td class="read_hit">조회수</td>
        <td class="read_hit2"><?php echo $rows['hit'] + 1 ?></td>
    </tr>


    <tr>
        <td colspan="4" class="read_content" valign="top">
            <?php echo $rows['content'] ?></td>
    </tr>
</table>

<div class="read_btn">
    <button class="read_btn1" onclick="location.href='guestbook.php'">목록</button>&nbsp;&nbsp;
    <?php
    if (isset($_SESSION['userid']) and $_SESSION['userid'] == $rows['id']) { ?>
        <button class="read_btn1" onclick="location.href='guest_modify.php?number=<?= $number ?>'">수정</button>&nbsp;&nbsp;
                                                                                                          <!-- 여기서부터 추가됨 -->
        <button class="read_btn1" a onclick="ask();">삭제</button>

        <script>
            function ask() {
                if (confirm("방명록을 삭제하시겠습니까?")) {
                    window.location = "guest_delete.php?number=<?= $number ?>"
                }
            }
        </script>
        <!-- 여기까지 -->
    <?php } ?>

</div>
</body>

</html>