<?php include'config.php';
?> 
<?php 
 	if(isset($_GET['sub_id']))
 	{
    $view_item = mysqli_query($connect,"select c.*,pc.* from tbl_company_brand c,tbl_product_category pc where c.fld_product_category_id=pc.fld_product_category_id and c.fld_company_brand_id='".$_GET['sub_id']."' order by c.fld_company_brand_id asc") or die (mysqli_error($connect));

    $fetch_item=mysqli_fetch_array($view_item);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $fetch_item['fld_product_category_name']; ?> : Cartridgewala</title>
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
							<li><a href="product_list.php?id=<?php echo $fetch_item['fld_product_category_id'];?>"><?php echo $fetch_item['fld_product_category_name'];?><i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="#"><?php echo $fetch_item['fld_company_brand_name'];?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="product-area shop-sidebar shop section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
						<?php
							$limit=6;
							$abc="select p.*,pc.* from tbl_product p,tbl_company_brand pc where p.fld_company_brand_id=pc.fld_company_brand_id and p.fld_company_brand_id='".$fetch_item['fld_company_brand_id']."' group by p.fld_product_id order by p.fld_product_id desc";
				             $view4 = mysqli_query($connect,$abc) or die (mysqli_error($connect));
				             $_SESSION['query']=$abc;
				            $fetch4=mysqli_fetch_array($view4);
				            $total_records=mysqli_num_rows($view4);  
				        ?>
				        
							<div id="target"></div> 	
							<div class="blog-pagination">
			                    <nav>
			                        <ul class="pagination"><center>
			                        <?php 
			                            if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
			                                        if($i == 1):
			                        ?>
				                            <li class='active' id="<?php echo $i;?>">
				                            	<a href='product_sub_list_pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a>
				                            </li>
			                        <?php 
			                        	else:
			                        ?>
				                            <li id="<?php echo $i;?>">
				                            	<a href='product_sub_list_pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a>
				                            </li>
			                        <?php 
			                    		endif;
			                    	?>
			                        <?php 
			                    		endfor;endif;
			                        ?>
			                        </ul>
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
                    jQuery("#target").load("product_sub_list_pagination.php?page=" + pageNumber);
                },
                onInit: function() {
                    jQuery("#target").html('loading...');
                    jQuery("#target").load("product_sub_list_pagination.php?page=1");
                }
            });
        });

    </script>