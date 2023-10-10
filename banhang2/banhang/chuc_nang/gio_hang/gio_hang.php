<?php 
	if(isset($_GET['id']) and $_SESSION['trang_chi_tiet_gio_hang']=="co")
	{
		$_SESSION['trang_chi_tiet_gio_hang']="huy_bo";
		if(isset($_SESSION['id_them_vao_gio']))
		{
			$so=count($_SESSION['id_them_vao_gio']);
			$trung_lap="khong";
			for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
			{
				if($_SESSION['id_them_vao_gio'][$i]==$_GET['id'])
				{
					$trung_lap="co";
					$vi_tri_trung_lap=$i;
					break;
				}
			}
			if($trung_lap=="khong")
			{
				$_SESSION['id_them_vao_gio'][$so]=$_GET['id'];
				$_SESSION['sl_them_vao_gio'][$so]=$_GET['so_luong'];
			}
			if($trung_lap=="co")
			{
				$_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]=$_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]+$_GET['so_luong'];
			}
		}
		else
		{
			$_SESSION['id_them_vao_gio'][0]=$_GET['id'];
			$_SESSION['sl_them_vao_gio'][0]=$_GET['so_luong'];
		}
	}

	$gio_hang="khong";
	if(isset($_SESSION['id_them_vao_gio']))
	{
		$so_luong=0;
		for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
		{
			$so_luong=$so_luong+$_SESSION['sl_them_vao_gio'][$i];
		}
		if($so_luong!=0)
		{
			$gio_hang="co";
		}
	}
	
	echo "Giỏ hàng";
	echo "<br>";
	echo "<br>";
	if($gio_hang=="khong")
	{
		echo "Không có sản phẩm trong giỏ hàng";
	}
	else 
	{
		echo "<form action='' method='post' >"; 
		echo "<input type='hidden' name='cap_nhat_gio_hang' value='co' > ";
		echo "<table>";
			echo "<tr>";
				echo "<td width='200px' >Tên</td>";
				echo "<td width='100px' >Số lượng</td>";
				echo "<td width='100px' >Đơn giá</td>";
				echo "<td width='170px' >Thành tiền</td>";
				echo "<td width='100px' > Chọn xóa</td>";
			echo "</tr>";
			$tong_cong=0;
			for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
			{
			
				$tv="select id,ten,gia from san_pham where id='".$_SESSION['id_them_vao_gio'][$i]."'";
				$tv_1=mysqli_query($connect,$tv);
				$tv_2=mysqli_fetch_array($tv_1);
				
				$tien=$tv_2['gia']*$_SESSION['sl_them_vao_gio'][$i];
				$tong_cong=$tong_cong+$tien;
				$name_id="id_".$i;
				$name_sl="sl_".$i;
				$name_ch ="ch_".$i;
				if($_SESSION['sl_them_vao_gio'][$i]!=0)
				{
				echo "<tr>";
					echo "<td>".$tv_2['ten']."</td>";
					echo "<td>";
					echo "<input type='hidden' name='".$name_id."' value='".$_SESSION['id_them_vao_gio'][$i]."' >";
				echo "<input type='text' style='width:50px' name='".$name_sl."' value='". $_SESSION['sl_them_vao_gio'][$i]."' > ";
					echo "</td>";
					echo "<td>".$tv_2['gia']."</td>";
					echo "<td>".$tien."</td>";
					echo "<td>";
					echo "<input type='checkbox' name='".$name_ch."' value='".$i."' >";
       				echo "</td>";
				echo "</tr>";
				if(isset($hang_duoc_mua1))
				{
				$hang_duoc_mua1=$hang_duoc_mua1.$_SESSION['id_them_vao_gio'][$i]."[|||]".$_SESSION['sl_them_vao_gio'][$i]."[|||||]";
				}
				}
			}	
			echo "<tr>";
				echo "<td>&nbsp;</td>";
				echo "<td><input type='submit' value='Cập nhật' > </td>";
				echo "<td>&nbsp;</td>";
				echo "<td>&nbsp;</td>";
			echo "</tr>";	
		echo "</table>";
		echo "</form>";
		echo "<br>";
		echo "Tổng giá trị đơn hàng là : ".$tong_cong." VNĐ";
		// nganluong
		echo "<form method='post' action='https://www.nganluong.vn/advance_payment.php'>";
		echo "<input type=hidden name=receiver value='lequan007@gmail.com' />";
		if(isset($hang_duoc_mua1))
		{
		echo "<input type=hidden name=product value='$hang_duoc_mua1' />";
		}
		echo "<input type=hidden name=price value='$tong_cong' />";
		echo "<input type=hidden name=return_url value='http://complete.com/thank.php' />";
		echo "<input type=hidden name=comments value='ghi chu' />";

		echo "<input type=image src='https://www.nganluong.vn/data/images/buttons/11.gif' />";
		echo "</form>";
		
		// bổ sung code thanh toán
		if(isset($_SESSION['user_id']))
		{
		echo "<form action='' method='post' >"; 
		echo "<input type='hidden' name='thong_tin_khach_hang' value='co' > ";
			echo "<br>";
			echo "<input type='submit' value='Gửi đơn hàng' >";
		echo "</form>";
			}
		else
		{
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<a href='?thamso=dang_ky'>Đăng ký để mua hàng và nhận ưu đãi</a>"; 
			echo "<br>";
			echo "Quý khách có thể Nhập nhanh thông tin mua hàng để chúng tôi liên hệ";
			include("chuc_nang/gio_hang/bieu_mau_mua_hang.php");
		}
	}
	
?>