<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
	if(isset($_GET['thamso'])){$tham_so=$_GET['thamso'];}else{$tham_so="";}
	switch($tham_so)
	{
		case "dang_nhap":
			include("chuc_nang/dang_nhap/login.php");
		break;
		case "do":
			include("chuc_nang/dang_nhap/xu_ly_login.php");
		break;
		case "thoat":
			include("chuc_nang/dang_nhap/thoat.php");
		break;
		default:
			include("chuc_nang/dang_nhap/nhapxuat.php");	
	}
?>
</body>
</html>