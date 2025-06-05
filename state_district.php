<?php

	include "config.php";

	if(isset($_POST["state"]))
	{
		$str="select * from tbl_district where fld_state_id='".$_POST['state']."' and fld_district_delete=0 ";
		$select1=mysqli_query($connect,$str) or die(mysqli_error($connect));
?>
			<option value="">Select District</option>
		
<?php 	  
		 while($row=mysqli_fetch_array($select1))
		{
?>
			<option value="<?php echo $row['fld_district_id'];?>"><?php echo $row['fld_district_name'];?></option>
<?php

		}
	}	 
		
?>