<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
//session_start();
echo '<title> Huong Dan tao trang dang ki/Dang Nhap)</title>';
//echo "<form action='index.php' method='post' >"; 
require_once("ket_noi.php"); 

if ( !isset($_SESSION['user_id']) )
{ 
	echo "<a href='?thamso=dang_nhap'>Đăng nhập</a>";
	echo "<br>";
	echo "<a href='?thamso=dang_ky'>Đăng ký</a>"; 
	echo "<br>";
}
else
{
	 if (isset($_SESSION['user_id']))
                        {
							$user_id = intval($_SESSION['user_id']);
	$sql_query = @mysqli_query($connect,"SELECT * FROM members WHERE id='{$user_id}'");
	$member = @mysqli_fetch_array( $sql_query ); 
	$usert = $member['username'];
	echo "Xin chào {$member['username']}."; 
	echo "<br><a href='?thamso=suathongtin_dn'>Sửa thông tin</a>";
	if ($member['admin']=="1")  
	{
		$_SESSION['admin'] = "1";
		echo "<br><a href='quan_tri/index.php'>Trang quản trị</a>";
	}
	echo "<br><a href='?thamso=thoat'>Thoát ra</a>";
						}
                        //If not isset -> set with dumy value
                            
						else
						{
	$_SESSION['user_id'] = "undefine";
                        }
}
//echo "</form>"; 
echo "<br>";
echo "<br>";
?>
</body>
</html>