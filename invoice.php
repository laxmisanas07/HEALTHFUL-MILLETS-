	<?php include'config.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Invoice : E-Commerce</title>
	<link rel="icon" type="image/png" href="images/favicon-logo.png">
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="assets/css/jquery-ui.css">
	<link rel="stylesheet" href="assets/css/jquery-ui.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/niceselect.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/flex-slider.min.css">
	<link rel="stylesheet" href="assets/css/owl-carousel.css">
	<link rel="stylesheet" href="assets/css/slicknav.min.css">
	<link rel="stylesheet" href="assets/css/default.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css"> 
	<link rel="stylesheet" href="assets/css/invoice.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	
</head>
	

<body>
	<?php include'header.php';?>
	
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="#">Invoice</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

    
    <section class="shop section">
    	<?php
			if(isset($_GET['order_id'])) 
			{
				$select1=mysqli_query($connect,"select * from tbl_order_add where fld_order_id='".$_GET['order_id']."' order by fld_order_id desc ") or die(mysqli_error($connect));
				$row=mysqli_fetch_array($select1);
				extract($row);

				 $query="select p.*,o.*,oi.*,cb.* from tbl_product p,tbl_order_add o,tbl_order_item oi,tbl_company_brand cb where
					   oi.fld_product_id=p.fld_product_id and 
					   oi.fld_order_id=o.fld_order_id and 
					   p.fld_company_brand_id=cb.fld_company_brand_id and 
					   o.fld_user_id='".$_SESSION['id']."' and 
					   oi.fld_order_id='".$_GET['order_id']."' order by oi.fld_order_id  desc";

				 $sel=mysqli_query($connect,$query) or die(mysqli_error($connect));
				 $date_inc = date('d-M-Y',strtotime($row['fld_order_modified_date']));
		?>
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
		   <div id="div_print" > 
			   	<div class="card">
			     	<?php
						$select2=mysqli_query($connect,"select * from tbl_my_profile order by fld_id desc ") or die(mysqli_error($connect));
							$row1=mysqli_fetch_array($select2);
					?>
			         <div class="card-header p-4">
			             <a class="pt-2 d-inline-block" href="index.html" data-abc="true"><img src="images/<?php echo $row1['fld_logo']?>"></a>
			             <div class="right" style="text-align:right;">
			                 <h3 class="mb-0">Invoice : <?php echo $row['fld_invoice_no'];?></h3>
			                 Date: <?php echo $date_inc;?>
			             </div>
			         </div>
			         <div class="card-body">
			             <div class="row mb-4">
			                 <div class="col-sm-5">
			                     <h5 class="mb-3">To:</h5>
			                     <h3 class="text-dark mb-1"><?php echo $row['fld_user_fname'];?> <?php echo $row['fld_user_lname'];?></h3>
			                     <div><?php echo $row['fld_order_address'];?></div>
			                     <div>Email : <?php echo $row['fld_order_email'];?></div>
			                     <div>Phone : <?php echo $row['fld_order_mobile'];?></div>
			                 </div><!-- 
			                 <div class="col-sm-6 ">
			                     <h5 class="mb-3">To:</h5>
			                     <h3 class="text-dark mb-1">Akshay Singh</h3>
			                     <div>478, Nai Sadak</div>
			                     <div>Chandni chowk, New delhi, 110006</div>
			                     <div>Email: info@tikon.com</div>
			                     <div>Phone: +91 9895 398 009</div>
			                 </div> -->
			             </div>
			             <div class="table-responsive-sm">
			                 <table class="table table-striped">
			                     <thead>
			                         <tr>
			                             <th class="center">Sr No.</th>
			                             <th>Item</th>
			                             <th>Company</th>
			                             <th class="right">Price</th>
			                             <th class="center">Qty</th>
			                             <th class="right">Total</th>
			                         </tr>
			                     </thead>
			                     <tbody>
			                     	<?php 

								        $count = 1;

								        while($fetch=mysqli_fetch_array($sel))
								        {
								        extract($fetch);
								    ?>
			                         <tr>
			                             <td class="center"><?php echo $count++; ?></td>
			                             <td class="left strong"><?php echo $fetch['fld_product_name']?></td>
			                             <td class="left"><?php echo $fetch['fld_company_brand_name']?></td>
			                             <td class="right">&#8377; <?php echo $fetch['fld_product_price']?></td>
			                             <td class="center"><?php echo $fetch['fld_product_quantity']?></td>
			                             <td class="right">&#8377; <?php echo $fetch['fld_product_qty_price']?></td>
			                         </tr>
			                        <?php }?>
			                     </tbody>
			                 </table>
			             </div>
			             <div class="row">
			                 <div class="col-lg-7 col-sm-5">
			                 </div>
			                 <div class="col-lg-5 col-sm-5 ml-auto">
			                     <table class="table table-clear">
			                         <tbody style="text-align: ;">
			                             <tr>
			                                 <td class="left">
			                                     <strong class="text-dark">Subtotal</strong>
			                                 </td>
			                                 <td class="right">&#8377; <?php echo $row['fld_subtotal_bill_amount']?></td>
			                             </tr>
			                             <tr>
			                                 <td class="left">
			                                     <strong class="text-dark">Shipping Charge</strong>
			                                 </td>
			                                 <td class="right">&#8377; <?php echo $row['fld_delivery_charges']?></td>
			                             </tr>
			                             <tr>
			                                 <td class="left">
			                                     <strong class="text-dark">Total</strong> </td>
			                                 <td class="right">
			                                     <strong class="text-dark">&#8377; <?php echo $row['fld_order_total_bill_amt']?></strong>
			                                 </td>
			                             </tr>
			                         </tbody>
			                     </table>
			                 </div>
			             </div>
			         </div>
			         <div class="card-footer bg-white">
			             <p class="mb-0"><?php echo $row1['fld_website']?>, <?php echo $row1['fld_address']?></p>
			         </div>
			    </div>
			</div>
		</div>
		<center>
	        <button class="btn btn-primary btn-lg my-1" type="button" name="print" value="Print" onClick="printdiv('div_print');"><i class="fa fa-print"></i> Print Invoice</button>
	     </center>
		<?php }?>
    </section>
	<?php include'footer.php';?>
<script language="javascript">
	function printdiv(printpage)
	{
	var headstr = "<html><head><title></title></head><body>";
	var footstr = "</body>";
	var newstr = document.all.item(printpage).innerHTML;
	var oldstr = document.body.innerHTML;
	document.body.innerHTML = headstr+newstr+footstr;
	window.print();
	document.body.innerHTML = oldstr;
	return false;
	}
</script>