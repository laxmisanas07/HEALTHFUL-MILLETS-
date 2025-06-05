<?php

	include "config.php";

	if(isset($_POST["district"]))
	{
		$str="select * from tbl_city where fld_district_id='".$_POST['district']."' and fld_city_delete=0 ";
		$select1=mysqli_query($connect,$str) or die(mysqli_error($connect));
?>
			<option value="">Select City</option>
		
<?php 	  
		 while($row=mysqli_fetch_array($select1))
		{
?>
			<option value="<?php echo $row['fld_city_id'];?>"><?php echo $row['fld_city_name'];?></option>
<?php

		}
	}	 
		
?>