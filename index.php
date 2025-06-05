<?php include'config.php';
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ink-Toner E-Commerce | Purchase best Ink-Toner | EMI Available : E-Commerce</title>
    <link rel="icon" type="image/png" href="images/favicon-logo.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
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
    <?php include'header.php'; ?>
    <section class="hero-slider bg-grey">
      <div class="container-fluid">
        <div class="main-hero-slider owl-carousel owl-theme">
          <?php 
              $view1 = mysqli_query($connect,"select * from tbl_home_slider where fld_slider_delete=0 order by fld_slider_id asc") or die (mysqli_error($connect));

              while ($fetch1=mysqli_fetch_array($view1))
              {
                  extract($fetch1);
          ?>
          <div class="item">
            <div class="single-slider item">
              <div class="row">
                <div class="col-lg-12 col-md-12 my-auto">
                  <img src="images/slider/<?php echo $fetch1['fld_slider_image']?>" class="w-100" alt="">
                </div>
              </div>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
    </section>
    <section class="shop-services section home">
      <div class="container">
        <center><h4>The Ecommerce Brand Promise</h4></center><br><br>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-service">
              <i class="fal fa-truck"></i>
              <h4>Free Delivery</h4>
              <p>Orders over $150</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-service">
              <i class="fal fa-sync"></i>
              <h4>Easy Return</h4>
              <p>Within 30 days returns</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-service">
              <i class="fal fa-lock"></i>
              <h4>Safe Payment</h4>
              <p>100% secure payment</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-service">
              <i class="fal fa-headset"></i>
              <h4>Easy EMI</h4>
              <p>Instant EMI is very simple</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="small-banner section">
      <div class="container">
        <div class="row">
          <?php 
              $view2 = mysqli_query($connect,"select * from tbl_offer_banner where fld_offer_banner_delete=0 order by fld_offer_banner_id desc") or die (mysqli_error($connect));

              while ($fetch2=mysqli_fetch_array($view2))
              {
                  extract($fetch2);
          ?>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="single-banner">
              <img src="images/banner/<?php echo $fetch2['fld_offer_banner_image'];?>" alt="#">
            </div>
          </div>
        <?php }?>
        </div>
      </div>
    </section>
    <div class="product-area section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title d-flex justify-content-between align-center">
              <div class="d-flex section-title-left">
                <i class="flaticon-tags"></i>
                <h2>Featured Products</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="product-slider owl-carousel owl-theme">
          <?php 
              $view3 = mysqli_query($connect,"select * from tbl_product where fld_product_delete=0 order by rand()") or die (mysqli_error($connect));

              while ($fetch3=mysqli_fetch_array($view3))
              {
                  extract($fetch3);
                   $view_photo = mysqli_query($connect,"select * from tbl_product_photo where fld_product_id='".$fetch3['fld_product_id']."' order by fld_product_photo_id desc") or die (mysqli_error($connect));
                   $fetch_photo=mysqli_fetch_array($view_photo);
          ?>
          <div class="item">
            <div class="single-product">
              <div class="product-img">
                <a href="product_details.php?prod_id=<?php echo $fetch3['fld_product_id'];?>">
                  <img class="product-img" src="images/product/<?php echo $fetch_photo['fld_product_photo'];?>" alt="#">
                </a>
                <div class="button-head">
                  <div class="product-action">
                    <a data-bs-toggle="modal" data-bs-target="#featured_products<?php echo $fetch3['fld_product_id'];?>" href="#">
                      <i class="far fa-eye"></i>
                      <span>Quick Shop</span>
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
                <h3>
                  <a href="product_details.php?prod_id=<?php echo $fetch3['fld_product_id'];?>"><?php echo $fetch3['fld_product_name'];?></a>
                </h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price">
                    <span class="old">&#8377; <?php echo $fetch3['fld_product_price']; ?></span>
                    <span>&#8377; <?php echo $fetch3['fld_product_final_price']; ?></span>
                  </div>
                  <?php 
                      if(isset($_SESSION['email']))
                      {
                    ?>
                    <a href="add_cart.php?cart_id=<?php echo $fetch3['fld_product_id'];?>">
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
      </div>
    </div>
    <section id="team" class="team section">
      <div class="container">
        <div class="row">
          <?php 
              $view_banner = mysqli_query($connect,"select * from tbl_product_banner where fld_product_banner_delete=0 order by rand()") or die (mysqli_error($connect));

              while ($fetch_banner=mysqli_fetch_array($view_banner))
              {
                  extract($fetch_banner);
          ?>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-team">
                <div class="image">
                  <a href="product_list.php?id=<?php echo $fetch_banner['fld_product_category_id'];?>"><img src="images/banner/<?php echo $fetch_banner['fld_product_banner_image']?>" alt="#"></a>
                </div>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
    </section>
    <?php 
        $view_item = mysqli_query($connect,"select * from tbl_product_category where fld_product_category_delete=0 order by fld_product_category_id asc") or die (mysqli_error($connect));

        while ($fetch_item=mysqli_fetch_array($view_item))
        {
            extract($fetch_item);
    ?>
    <div class="product-area section">
      <div class="container">
        <?php 
          $view4 = mysqli_query($connect,"select p.*,pc.* from tbl_product p,tbl_product_category pc where p.fld_product_category_id=pc.fld_product_category_id and p.fld_product_category_id='".$fetch_item['fld_product_category_id']."' and p.fld_product_delete=0 order by rand()") or die (mysqli_error($connect));
          $fetch_name=mysqli_fetch_array($view4);
        ?>
        <div class="row">
          <div class="col-12">
            <div class="section-title d-flex justify-content-between align-center">
              <div class="d-flex section-title-left">
                <i class="flaticon-hot-deal"></i>
                <h2><?php if(!empty($fetch_name['fld_product_category_name'])) { echo $fetch_name['fld_product_category_name']; } ?></h2>
              </div>
              <div class="section-title-right">
                <a href="product_list.php?id=<?php echo $fetch_name['fld_product_category_id'];?> ">View More <i class="far fa-long-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="product-slider owl-carousel owl-theme">
          <?php
            $abc=$view4;
            while($fetch4=mysqli_fetch_array($abc))
            {
                extract($fetch4);
                 $view_photo1 = mysqli_query($connect,"select * from tbl_product_photo where fld_product_id='".$fetch4['fld_product_id']."' and fld_product_photo_delete=0 order by rand() ") or die (mysqli_error($connect));
                 $fetch_photo1=mysqli_fetch_array($view_photo1);
          ?>
          <div class="item">
            <div class="single-product">
              <div class="product-img">
                <a href="product_details.php?prod_id=<?php echo $fetch4['fld_product_id'];?>">
                  <img class="product-img" src="images/product/<?php echo $fetch_photo1['fld_product_photo'];?>" alt="#">
                </a>
                <div class="button-head">
                  <div class="product-action">
                    <a data-bs-toggle="modal" type="button" data-bs-target="#featured_products<?php echo $fetch4['fld_product_id'];?>" href="#">
                      <i class="far fa-eye"></i>
                      <span>Quick Shop</span>
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
                <h3>
                  <a href="product_details.php?prod_id=<?php echo $fetch4['fld_product_id'];?>"><?php echo $fetch4['fld_product_name'];?></a>
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
      </div>
    </div>
    <?php }?>
      


    
      <?php include'footer.php'; ?>


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