<?php 
	include "config.php";
	session_start();
	if(isset($_GET['cart_id']))
	{
		$add=mysqli_query($connect,"insert into tbl_cart(fld_product_id,fld_user_id)values('".$_GET['cart_id']."','". $_SESSION['id']."') ") or die(mysqli_error($connect));

		if($add)
			{
				echo "<script>";
				echo "alert('Product Added In Cart');";
				echo "window.location.href='cart.php';";
				echo "</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('Error');";
				echo "window.location.href='index.php';";
				echo "</script>";
			}
}
?>