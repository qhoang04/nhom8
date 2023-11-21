<meta charset=utf8>
<?php 
    session_start();
    include('connect.php');
    $us = $_GET['user'];
    $pw = $_GET['pass'];

    $sql = "SELECT * FROM sinhvien WHERE masv = '{$us}' AND matkhau = '{$pw}'";
    mysqli_query($con, "SET NAMES 'utf8'");
    $rs = mysqli_query($con, $sql);
    if (mysqli_num_rows($rs) > 0) {
        $row = mysqli_fetch_array($rs);
        $_SESSION["code"] = $row['masv'];
        $_SESSION["info"] = $us." _ " .$row["hoten"]. " _ ".$row["lop"];
        echo $us. " _ ".$row['hoten']."&nbsp; |&nbsp; <a href=QLSV.php> Next </a>";
    }
    else {
        echo "Bạn nhâp thông tin sai";
    
    mysqli_free_result($rs);
    mysqli_close($con);
    }
?>