<?php include'config.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cart : E-Commerce</title>
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
							<li class="active"><a href="#">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<form method="post">

	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<?php 
					$s_total[]="";
			              $view = mysqli_query($connect,"select p.*,c.* from tbl_product p,tbl_cart c where p.fld_product_id=c.fld_product_id and c.fld_product_status='in_cart' and c.fld_user_id='".$_SESSION['id']."' group by c.fld_cart_id  order by c.fld_cart_id asc") or die (mysqli_error($connect));

			              while ($fetch=mysqli_fetch_array($view))
			              {
			                  extract($fetch);

			                  $s_total[]=$fld_product_final_price;
			                   $view_photo = mysqli_query($connect,"select * from tbl_product_photo where fld_product_id='".$fetch['fld_product_id']."' order by fld_product_photo_id desc") or die (mysqli_error($connect));
			                   $fetch_photo=mysqli_fetch_array($view_photo);
			          ?>

			           <script type="text/javascript">
                            function amount<?php echo $fetch['fld_product_id'];?>()
                            {
                                var mrp=<?php echo $fetch['fld_product_final_price'];?>;
                                var quan=parseInt(document.getElementById('qtybutton<?php echo $fetch['fld_product_id'];?>').value);
                                var result=mrp*quan;
                                if(isNaN(result)) result=0;
                                document.getElementById('subtotal<?php echo $fetch['fld_product_id'];?>').value=result;
                                var arr = document.getElementsByName('subtotal[]');
                                var total=0;
                                for(var i=0;i<arr.length;i++)
                                {
                                    if(parseFloat(arr[i].value))
                                        total += parseFloat(arr[i].value);
                                }
                                document.getElementById('total_amount').value = total;
                                document.getElementById('grand_total').value=total; 

                            }
                            function final() 
                            {
                                var total1=parseFloat(document.getElementById('total_amount').value);
                                var ship=document.getElementById('shipping');
                                if(ship.checked==true)
                                {
                                    var ship=parseFloat(document.getElementById('shipping').value);
                                    var g_total=total1+ship;
                                }
                                else    
                                {
                                    var g_total=parseFloat(document.getElementById('total_amount').value);
                                }  
                                document.getElementById('grand_total').value=g_total; 
                           
                            }
                        </script>
					<div class="shopping-cart-single">
						<div class="row">
							<input name="product_id[]" hidden="" value="<?php echo $fetch['fld_product_id'];?>">
							<input name="cart_id[]" hidden="" value="<?php echo $fetch['fld_cart_id'];?>">
							<div class="col-lg-2"> <img src="images/product/<?php echo $fetch_photo['fld_product_photo'];?>" alt=""> </div>
							<div class="col-lg-10 my-auto">
								<div class="d-flex justify-content-between cart-title">
									<h6><?php echo $fetch['fld_product_name'];?></h6> 
									<a href="order_item_delete.php?del_id=<?php echo $fetch['fld_cart_id'];?>">
										<i class="fal fa-times"></i>
									</a>
								</div>
								<div class="row">
		                            <div class="col-lg-4">
		                                <label class="form-label">Unit Price (&#8377;)</label>
		                                <input class="form-control" type="text" name="fld_product_final_price[]" value="<?php echo $fetch['fld_product_final_price']; ?>" readonly >
		                            </div>
		                            <div class="col-lg-4">
		                               <label class="form-label">Quantity</label>
		                                <input class="form-control" style="text-align:center;" type="text" name="qtybutton[]" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="qtybutton<?php echo $fetch['fld_product_id'];?>" onload="amount<?php echo $fetch['fld_product_id'];?>()" onkeyup="amount<?php echo $fetch['fld_product_id'];?>()" value="1">
		                            </div>
		                            <div class="col-lg-4">
		                                <label class="form-label">Sub Total (&#8377;)</label>
		                                <input class="form-control" type="text" name="subtotal[]" id="subtotal<?php echo $fetch['fld_product_id'];?>" value="<?php echo $fld_product_final_price; ?>" readonly>
		                            </div>
		                        </div>
								
							</div>
						</div>
					</div>
					<?php }?>
				</div>
				<div class="col-lg-5">
					<div class="cart-total-amount">
						<ul>
							<li><div class="row">
	                            <div class="col-lg-4">
	                                <label class="form-label">Cart Subtotal (&#8377;)</label>
	                            </div>
	                            <div class="col-lg-8">
	                            	<input type="text" style="text-align:right;" class="form-control" name="total_amount[]" id="total_amount"  readonly value="<?php echo array_sum($s_total);?>" >
	                            </div>
	                        </div></li>
							<li><div class="row">
								  <?php 

                                    $abc="select * from tbl_my_profile order by fld_id";
                                    $query_abc=mysqli_query($connect,$abc) or die(mysqli_error($connect));
                                    $fetch_abc=mysqli_fetch_array($query_abc);
                                    extract($fetch_abc);

                                ?>
	                           
	                            <div class="col-lg-12">
	                            	<input type="checkbox" required=""	 id="shipping" name="shipping" value="<?php echo $fetch_abc['fld_delivery_charges'];?>" onclick="final()" /> Shipping Charges <span><?php echo $fetch_abc['fld_delivery_charges'];?></span>
	                            </div>
	                        </div></li>
	                        <li class="last"><div class="row">
	                            <div class="col-lg-4">
	                                <label class="form-label">Grand Total (&#8377;)</label>
	                            </div>
	                            <div class="col-lg-8">
	                            	<input type="text" style="text-align:right;" class="form-control" name="grand_total" id="grand_total" readonly >
	                            </div>
	                        </div></li>
                    	</ul>
						<div class="checkout-section"> <button name="checkout" type="submit" class="btn checkout-btn">Checkout</button>
							<a href="index.php" class="btn">Continue shopping</a> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>

				<?php 


                    if (isset($_POST['checkout'])) 
                    {
                        extract($_POST);
                        $abc=array_sum($total_amount);

                    echo $query2="insert into tbl_order_add(fld_user_id,fld_my_profile_id,fld_order_mobile,fld_order_total_bill_amt,fld_delivery_charges,fld_subtotal_bill_amount) values('".$_SESSION['id']."','".$fetch_abc['fld_id']."','".$fetch_abc['fld_mobile']."','$grand_total','".$fetch_abc['fld_delivery_charges']."','$abc')";
                    
                        $add=mysqli_query($connect,$query2) or die (mysqli_error($connect));


                        $select_order="select * from tbl_order_add where fld_user_id='".$_SESSION['id']."' group by fld_order_id  order by fld_order_id desc";
                        $sel1=mysqli_query($connect,$select_order) or die(mysqli_error($connect));
                        $fetch_order=mysqli_fetch_array($sel1);
                            extract($fetch_order);


                        $status=array();
                        $cart=count($_POST['cart_id']);
                        for ($i=0; $i<=$cart; $i++) 
                        { 
                            if (($_POST['cart_id'][$i]!="") && ($_POST['product_id'][$i]!="")) 
                            {
                                
                                $query3="insert into tbl_order_item(fld_order_id,fld_cart_id,fld_product_id,fld_product_quantity,fld_product_price,fld_product_qty_price ) values('".$fetch_order['fld_order_id']."','".$_POST['cart_id'][$i]."','".$_POST['product_id'][$i]."','".$_POST['qtybutton'][$i]."','".$_POST['fld_product_final_price'][$i]."','".$_POST['subtotal'][$i]."')"; 

                                $update=mysqli_query($connect,"update tbl_cart set fld_product_status='In_checkout' where fld_cart_id='".$_POST['cart_id'][$i]."'") or die(mysqli_error($connect));
                                $add1=mysqli_query($connect,$query3) or die (mysqli_error($connect));
                                if(!empty($add1)) 
                                {
                                    $status[]=1;  
                                    echo "<script>";
                                    echo "window.location.href='checkout.php';";
                                    echo "</script>";             
                                }
                                else
                                {
                                    echo "<script>";
                                    echo "window.location.href='index.php';";
                                    echo "</script>";
                                }
                            } 
                        }

                        
                    }

                ?>
	<?php include'footer.php';?>
