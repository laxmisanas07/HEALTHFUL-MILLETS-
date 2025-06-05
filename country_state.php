<?php

	include "config.php";

	if(isset($_POST["fld_country"]))
	{
		 $str="select * from tbl_state where fld_country_id='".$_POST['fld_country']."' and fld_state_delete=0 order by fld_state_id desc";
		$select1=mysqli_query($connect,$str) or die(mysqli_error($connect));
?>
			<option value="">Select State</option>
		
<?php 	  
		 while($row1=mysqli_fetch_array($select1))
		{
?>
			<option value="<?php echo $row1['fld_state_id'];?>"><?php echo $row1['fld_state_name'];?></option>
<?php

		}
	}	 
		
?>