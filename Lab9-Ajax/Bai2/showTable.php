<?php 
    $op = $_GET["chon"];
    if ($op != "") {
        include ("database.class.php");
        $dao = new Dao("root","","udn");

        $sql = "SELECT * FROM {$op}";
        $header = "DANH SACH {$op}";
        $dao -> table($sql, $header);
    }
?>