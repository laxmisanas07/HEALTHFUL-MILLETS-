<?php include'config.php';
?> 
	<?php 
	 	if(isset($_GET['id']))
	 	{
	    $view_item = mysqli_query($connect,"select * from tbl_product_category where fld_product_category_id='".$_GET['id']."' order by fld_product_category_id asc") or die (mysqli_error($connect));

	    $fetch_item=mysqli_fetch_array($view_item);
	    
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $fetch_item['fld_product_category_name']; ?> : Millets</title>
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

	<link rel="stylesheet" href="pagination/simplePagination.css" />
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
							<li class="active"><a href="#"><?php echo $fetch_item['fld_product_category_name'];?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="product-area shop-sidebar shop section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-12">
					<div class="shop-sidebar">
						<div class="single-widget category">
							<h3 class="title">Company</h3>
							<ul class="categor-list">
								<?php 
					              $view1 = mysqli_query($connect,"select * from tbl_company_brand where fld_product_category_id='".$_GET['id']."' order by fld_company_brand_id desc") or die (mysqli_error($connect));

					              while ($fetch1=mysqli_fetch_array($view1))
					              {
					                  extract($fetch1);
					                  $view2 = mysqli_query($connect,"select * from tbl_product where fld_company_brand_id='".$fetch1['fld_company_brand_id']."' order by fld_product_id desc") or die (mysqli_error($connect));
					          	?>
								<li><a href="product_sub_list.php?sub_id=<?php echo $fetch1['fld_company_brand_id'];?>&category_id=<?php echo $_GET['id'];?>"><?php echo $fetch1['fld_company_brand_name'];?> <span>(<?php echo mysqli_num_rows($view2) ?>)</span></a></li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-8 col-12">
					
						<?php
							$limit=6;
							$abc="select p.*,pc.* from tbl_product p,tbl_product_category pc where p.fld_product_category_id=pc.fld_product_category_id and p.fld_product_category_id='".$fetch_item['fld_product_category_id']."' and p.fld_product_delete=0 group by fld_product_id order by fld_product_id desc";
				             $view4 = mysqli_query($connect,$abc) or die (mysqli_error($connect));
				             $_SESSION['query']=$abc;
				            $fetch4=mysqli_fetch_array($view4);
				            $total_records=mysqli_num_rows($view4);  
				        ?>
				        
							<div id="target"></div> 	
							<div class="blog-pagination">
			                    <nav><center>
			                        <ul class="pagination pagination-center">
			                        <?php 
			                            if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
			                                        if($i == 1):
			                        ?>
				                            <li class='active' id="<?php echo $i;?>">
				                            	<a href='product_list_pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a>
				                            </li>
			                        <?php 
			                        	else:
			                        ?>
				                            <li id="<?php echo $i;?>">
				                            	<a href='product_list_pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a>
				                            </li>
			                        <?php 
			                    		endif;
			                    	?>
			                        <?php 
			                    		endfor;endif;
			                        ?>
			                        </ul></center>
			                    </nav>
			                </div>
			          
						
				</div>
			</div>
		</div>
	</section>
	<?php }?>
	<?php include'footer.php';?>
	<script src="pagination/jquery.simplePagination.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('.pagination').pagination({
                items: <?php echo $total_records;?>,
                itemsOnPage: <?php echo $limit;?>,
                cssStyle: 'light-theme',
                currentPage: 1,
                onPageClick: function(pageNumber) {
                    jQuery("#target").html('loading...');
                    jQuery("#target").load("product_list_pagination.php?page=" + pageNumber);
                },
                onInit: function() {
                    jQuery("#target").html('loading...');
                    jQuery("#target").load("product_list_pagination.php?page=1");
                }
            });
        });

    </script>