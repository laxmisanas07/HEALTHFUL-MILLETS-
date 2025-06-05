<?php 
include "config.php";
if(isset($_GET['del_id']))
{
	
	$del=mysqli_query($connect,"delete from tbl_cart where fld_cart_id='".$_GET['del_id']."'") or die(mysqli_error($connect));

	$back="javascript:history.back()";
	if($del)
		{
				echo "<script>";
				echo "alert('Product Remove');";
				echo "window.location.href='cart.php';";
				echo "</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('Error');";
				echo "window.location.href='cart.php';";
				echo "</script>";
			}
}
?>