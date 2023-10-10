<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Trang quan tri</p>
    <?php 
        if (isset($_COOKIE['username']) and isset($_COOKIE['password'])) {
            echo "Xin chào: ".$_COOKIE['username'];
            echo "<br><a href='logout.php'>Logout</a>;";
        }
        else {
            echo "<script>alert('Bạn chưa đăng nhập'); location.href='dangnhap.php';</script>";
        }
    ?>
    <a href="logout.php">Thoát ra</a>
</body>
</html>
