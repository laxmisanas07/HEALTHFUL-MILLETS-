<div class="row">
	<?php

	include "config.php";
	session_start();

		$limit=6;
	    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
	    $start_from = ($page-1) * $limit; 

	    $query=$_SESSION['query'];
	    $query .= " LIMIT $start_from, $limit";

	    // echo $query;
         $view4 = mysqli_query($connect,$query) or die (mysqli_error($connect));
        while($fetch4=mysqli_fetch_array($view4))
        {
            extract($fetch4);
             $view_photo1 = mysqli_query($connect,"select * from tbl_product_photo where fld_product_id='".$fetch4['fld_product_id']."' order by rand() ") or die (mysqli_error($connect));
             $fetch_photo1=mysqli_fetch_array($view_photo1);
      ?>
	<div class="col-lg-3 col-md-4 col-12 mt-4">
		<div class="single-product">
			<div class="product-img">
				<a href="product_details.php?prod_id=<?php echo $fetch4['fld_product_id'];?>"> <img class="product-img" src="images/product/<?php echo $fetch_photo1['fld_product_photo'];?>" alt="#"></a>
				<div class="button-head">
					<div class="product-action">
						 <a data-bs-toggle="modal" data-bs-target="#featured_products<?php echo $fetch4['fld_product_id'];?>" href="#">
						 	<i class="far fa-eye"></i><span>Quick Shop</span>
						 </a> 
						<?php 
                      if(isset($_SESSION['email']))
                      {
                    ?>
                    <a href="wishlist_add.php?w_id=<?php echo $fetch3['fld_product_id'];?>">
                      <i class="fal fa-heart"></i>
                      <span>Add to Wishliast</span>
                    </a>
                  <?php }
                  else{
                  ?>
                    <a href="user_login.php">
                      <i class="fal fa-heart"></i>
                      <span>Add to Wishliast</span>
                    </a>
                  <?php }?>
					</div>
				</div>
			</div>
			<div class="product-content">
				<h3><a href="product_details.php?prod_id=<?php echo $fetch4['fld_product_id'];?>"><?php echo $fetch4['fld_product_name']; ?></a>
				</h3>
				
				<div class="d-flex justify-content-between">
					<div class="product-price"> 
	                    <span class="old">&#8377; <?php echo $fetch4['fld_product_price']; ?></span>
	                    <span>&#8377; <?php echo $fetch4['fld_product_final_price']; ?></span> 

	        </div>
					
                 <?php 
                      if(isset($_SESSION['email']))
                      {
                    ?>
                    <a href="add_cart.php?cart_id=<?php echo $fetch4['fld_product_id'];?>">
                        <button class="product-cart-btn" type="button">
                          <i class="fal fa-shopping-cart"></i>
                        </button>
                      </a>
                  <?php }
                    else{
                  ?>
                    <a class="product-cart-btn" href="user_login.php" type="button">
                    <i class="fal fa-shopping-cart"></i>
                  </a>
                  <?php }?>
				</div>
			</div>
		</div>
	</div>
	<?php }?>
  </div>

  	<?php 
        $view_modal = mysqli_query($connect,"select p.*,pc.*,cb.* from tbl_product p,tbl_product_category pc,tbl_company_brand cb where pc.fld_product_category_id=p.fld_product_category_id and cb.fld_company_brand_id=p.fld_company_brand_id order by p.fld_product_id desc") or die (mysqli_error($connect));
        while($fetch_modal=mysqli_fetch_array($view_modal)){
          $view_photo_model = mysqli_query($connect,"select * from tbl_product_photo where fld_product_id='".$fetch_modal['fld_product_id']."' order by rand() ") or die (mysqli_error($connect));
                   $fetch_photo_model=mysqli_fetch_array($view_photo_model);
    ?>

        <div class="modal" id="featured_products<?php echo $fetch_modal['fld_product_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <img src="images/product/<?php echo $fetch_photo_model['fld_product_photo'];?>" alt="#">
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="quickview-content">
                      <h2><?php echo $fetch_modal['fld_product_name'];?></h2>
                      <div class="d-flex mb-3">
                        <span>Brand:</span>
                        <b><?php echo $fetch_modal['fld_product_category_name'];?></b>
                      </div>
                      <div class="d-flex mb-3">
                        <span>Category:</span>
                        <b><?php echo $fetch_modal['fld_company_brand_name'];?></b>
                      </div><span><del>&#8377; <?php echo $fetch_modal['fld_product_price']; ?></del></span>
                      <h3><span>&#8377; <?php echo $fetch_modal['fld_product_final_price']; ?></span></h3>
                      <div class="quickview-stock">
                        <span>
                          <i class="fa fa-check-circle-o"></i> Stock Available </span>
                      </div>
                      <div class="add-to-cart">
                        <?php 
                          if(isset($_SESSION['email']))
                          {
                        ?>
                        <a href="add_cart.php?cart_id=<?php echo $fetch_modal['fld_product_id'];?>" class="btn">Add to cart</a>
                      <?php }
                        else{
                      ?>
                        <a class="btn" href="user_login.php" type="button" class="btn">Add to cart</a>
                      <?php }?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    <?php } ?>