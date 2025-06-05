<?php include'config.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Checkout : E-Commerce</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
							<li class="active"><a href="#">Checkout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 

        $query="select p.*,o.*,oi.* from tbl_product p,tbl_order_add o,tbl_order_item oi where  oi.fld_product_id=p.fld_product_id and oi.fld_order_id=o.fld_order_id and o.fld_user_id='".$_SESSION['id']."' group by o.fld_order_id  order by o.fld_order_id  desc";

        $sel=mysqli_query($connect,$query) or die(mysqli_error($connect));

        $fetch=mysqli_fetch_array($sel);
        extract($fetch);
    ?>

  
    <section class="shop checkout section">
    	<form method="POST" class="form">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="">
                        <h2>Your Shipping Address</h2><br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>First Name<span>*</span></label>
                                    <input type="text" name="fname" placeholder="" required="required"> </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Last Name<span>*</span></label>
                                    <input type="text" name="lname" placeholder="" required="required"> </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Email Address<span>*</span></label>
                                    <input type="email" name="email" value="<?php echo $_SESSION['email'] ?>" placeholder="" required="required"> </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Phone Number<span>*</span></label>
                                    <input type="text" name="number" value="<?php echo $fetch['fld_order_mobile'] ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" minlength="10" required="required"> </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Country<span>*</span></label>
                                    <select name="check_country" id="check_country">
                                        <option value="">Select Country</option>
                                       <?php
                                            $query=mysqli_query($connect,"select * from tbl_country where fld_country_delete=0 order by fld_country_name asc ");
                                        
                                            while($row=mysqli_fetch_assoc($query))
                                            {
                                                extract($row);
                                         ?>
                                        <option value="<?php echo $row['fld_country_id'];?>"><?php echo $row['fld_country_name'];?></option>
                                    <?php }?>
                                    </select>
                                </div>
                            </div> 
                            
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>State<span>*</span></label>
                                    <select name="state" id="state" >
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                            </div> 

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group" >
                                    <label>District<span>*</span></label>
                                    <select name="district" id="district">
                                        <option value="">Select District</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>City<span>*</span></label>
                                    <select name="city" id="city">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Address<span>*</span></label>
                                    <input type="text" name="address" placeholder="" required="required"> </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Post Code<span>*</span></label>
                                    <input type="text" name="post_code" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6" minlength="6" required="required"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-total-amount">
                        <ul>
                            <li>Shipping Charges<span><?php echo $fetch['fld_delivery_charges'];?></span></li>
                            <li>Grand Total<span><?php echo $fetch['fld_order_total_bill_amt'];?></span></li>
                            <li class="last"> <input class="checkout-toggle2 w-auto h-auto" type="checkbox"  required="" /> &nbsp;Cash On Delivery</li>
                        </ul>
                        <div class="checkout-section">
                        <div class="checkout-section">
                        	<button class="btn checkout-btn" type="submit" name="order" >Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    	</form>
    </section>



    <?php 

        if (isset($_POST['order'])) 
        {
            extract($_POST);

            $abc="select * from tbl_my_profile order by fld_id asc";
            $query_abc=mysqli_query($connect,$abc) or die(mysqli_error($connect));
            $fetch1=mysqli_fetch_array($query_abc);
            extract($fetch1);
            $invoice_prefix=$fetch1['fld_invoice_prefix'];
            
            $invoice_id=str_pad($fetch['fld_order_id'], 4, '0', STR_PAD_LEFT);
            $invoice=$invoice_prefix.$invoice_id;

           $update1="update tbl_order_add set
            fld_user_fname='".$fname."',
            fld_user_lname='".$lname."',
            fld_order_address='".$address."',
            fld_order_city='".$city."',
            fld_order_state='".$state."',
            fld_order_district='".$district."',
            fld_order_country='".$country."',
            fld_order_postcode='".$post_code."',
            fld_order_mobile='".$number."',
            fld_order_email='".$email."', 
            fld_order_status='Confirmed',
            fld_invoice_no='".$invoice."'
            where fld_order_id='".$fetch['fld_order_id']."' ";
            $up=mysqli_query($connect,$update1) or die(mysqli_error($connect));

            $back="invoice.php?order_id=".$fetch['fld_order_id'];

            if($up)
            {
               
                    echo '<script type="text/javascript">';
                    echo " alert('Order Has Been Placed');";
                    echo "window.location.href = '".$back."';";
                    echo '</script>';
                
            }
            else
            {
                echo "<script>";
                echo "alert('Order Has Not Been Placed');";
                echo "window.location.href='checkout.php';";
                echo "</script>";
            }
        }


    ?>
	<?php include'footer.php';?>

                            <script type="text/javascript">
                              $(document).ready(function(){
                                $("select#check_country").change(function(){
                                      var a = $("#check_country option:selected").val();
                                         // alert(a);      
                                      $.ajax({
                                          type: "POST",
                                          url: "country_state.php", 
                                          data: { fld_country : a  } 
                                      }).done(function(data){
                                          $("#state").html(data);
                                      });
                                  });
                              });
                            </script>

                               <script type="text/javascript">
                              $(document).ready(function(){
                                $("select#state").change(function(){
                                      var u = $("#state option:selected").val();
                                      // alert(u);      
                                      $.ajax({
                                          type: "POST",
                                          url: "state_district.php", 
                                          data: { state : u  } 
                                      }).done(function(data){
                                          $("#district").html(data);
                                      });
                                  });
                              });
                            </script>

                             <script type="text/javascript">
                              $(document).ready(function(){
                                $("select#district").change(function(){
                                      var u = $("#district option:selected").val();
                                      // alert(u);      
                                      $.ajax({
                                          type: "POST",
                                          url: "district_city.php", 
                                          data: { district : u  } 
                                      }).done(function(data){
                                          $("#city").html(data);
                                      });
                                  });
                              });
                            </script>

                            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->