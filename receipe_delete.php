<?php 
include "../config.php";
if(isset($_GET['id']))
{
	$del=mysqli_query($connect,"delete from fld_receipe where id='".$_GET['id']."'") or die(mysqli_error($connect));

		$back="javascript:history.back()";
		if($del)
			{
				echo "<script>";
				echo "alert('Deleted Successfully');";
				echo "window.location.href='own_receipe_list.php';";
				echo "</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('Error');";
				echo "window.location.href='own_receipe_list.php';";
				echo "</script>";
			}
}
?>