<?php
ob_start();
require_once("./config.php");
$idPA = $_GET["idPA"];
$qr1 = "UPDATE binhchon SET SoLanChon = SoLanChon+1 WHERE idBC=1";
$qr = "UPDATE phuongan SET SoLanChon = SoLanChon+1 WHERE idBC=1 AND idPA=$idPA";
if (mysqli_query($config, $qr1) && mysqli_query($config, $qr))
    header('location:ketquabinhchon.php');
else
    echo "Failure!";
?>
