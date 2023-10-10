<?php 
    $connect = mysqli_connect("localhost:4306", "root", "");
    mysqli_query($connect, "SET NAMES 'UTF8'");
    if (!$connect) {
        die("Không thể kết nối đến Database: " . mysqli_connect_error());
    }

    mysqli_select_db($connect, 'loginwithcookie'); 
?>
