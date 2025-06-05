<?php include'config.php';?> 
<?php 
  if(isset($_GET['prod_id']))
  {

    $view_prod = mysqli_query($connect,"select p.*,pc.*,cb.* from tbl_product p,tbl_product_category pc,tbl_company_brand cb where fld_product_id='".$_GET['prod_id']."' and pc.fld_product_category_id=p.fld_product_category_id and cb.fld_company_brand_id=p.fld_company_brand_id order by p.fld_product_id desc") or die (mysqli_error($connect));
    $fetch_prod=mysqli_fetch_array($view_prod);     
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Buy <?php echo $fetch_prod['fld_product_name'];?> </title>
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
    <?php include'header.php';?>
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="bread-inner">
              <ul class="bread-list">
                <li>
                  <a href="index.php">Home <i class="ti-arrow-right"></i>
                  </a>
                </li>
                <li><a href="product_list.php?id=<?php echo $fetch_prod['fld_product_category_id'];?>"><?php echo $fetch_prod['fld_product_category_name'];?><i class="ti-arrow-right"></i></a></li>
                 <li><a href="product_sub_list.php?sub_id=<?php echo $fetch_prod['fld_company_brand_id'];?>&category_id=<?php echo $fetch_prod['fld_product_category_id'];?>"><?php echo $fetch_prod['fld_company_brand_name'];?><i class="ti-arrow-right"></i></a></li>
                <li class="active"><a href="#"><?php echo $fetch_prod['fld_product_name'];?></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="shop single section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-lg-5 col-12">
                <div class="product-gallery">
                  <div class="flexslider-thumbnails">
                    <ul class="slides">
                      <?php
                        $view_photo = mysqli_query($connect,"select * from tbl_product_photo where fld_product_id='".$fetch_prod['fld_product_id']."' order by fld_product_photo_id desc") or die (mysqli_error($connect));
                          while($fetch_photo=mysqli_fetch_array($view_photo))
                          {
                      ?>
                      <li data-thumb="images/product/<?php echo $fetch_photo['fld_product_photo'];?>" >
                        <img src="images/product/<?php echo $fetch_photo['fld_product_photo'];?>" alt="#">
                      </li>
                      <?php }?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-7 col-12">
                <div class="product-des">
                  <div class="short"> 
                    <h4><?php echo $fetch_prod['fld_product_name'];?></h4>
                    <p class="price">
                      <span class="discount">&#8377; <?php echo $fetch_prod['fld_product_final_price']; ?></span>
                      <s>&#8377; <?php echo $fetch_prod['fld_product_price']; ?></s>
                    </p>
                  </div>
                  <div class="product-buy">
                    <div class="add-to-cart">
                      <?php 
                        if(isset($_SESSION['email']))
                        {
                      ?>
                      <a class="btn" href="add_cart.php?cart_id=<?php echo $fetch_prod['fld_product_id'];?>" >Add to cart</a>
                    <?php }
                    else{
                    ?>
                      <a class="btn" href="user_login.php" type="button">Add to cart</a>
                    <?php }?>
                      <?php 
                          if(isset($_SESSION['email']))
                          {
                        ?>
                        <a href="wishlist_add.php?w_id=<?php echo $fetch3['fld_product_id'];?>" class="btn min">
                          <i class="fal fa-heart"></i>
                        </a>
                      <?php }
                      else{
                      ?>
                        <a href="user_login.php" class="btn min">
                          <i class="fal fa-heart"></i>
                        </a>
                      <?php }?>
                    </div>
                    <div class="single-product-info">
                      <p>Category : <a href="#"><?php echo $fetch_prod['fld_product_category_name'];?></a>
                      </p>
                      <p>Company Brand : <a href="#"><?php echo $fetch_prod['fld_company_brand_name'];?></a>
                      </p>
                      <p>Cuisine : <a href="#"><?php echo $fetch_prod['fld_product_colour'];?></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="product-info">
                  <nav class="nav-main">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">Speciality</button>
                      <button class="nav-link" id="nav-feature-tab" data-bs-toggle="tab" data-bs-target="#nav-feature" type="button" role="tab" aria-controls="nav-feature" aria-selected="false">Feature</button>
                      <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Usage/Apllication</button>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                      <div class="tab-single">
                        <div class="row">
                          <div class="col-12">
                            <div class="single-des">
                              <?php echo $fetch_prod['fld_product_description'];?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-feature" role="tabpanel" aria-labelledby="nav-feature-tab">
                      <div class="tab-single">
                        <div class="row">
                          <div class="col-12">
                            <div class="single-des">
                              <h4>Product Features:</h4>
                              <ul>
                                <li><b>Brand</b> : <?php echo $fetch_prod ['fld_company_brand_name'];?></li>
                                <li><b>Pacaging Size</b> : <?php echo $fetch_prod ['fld_product_height'];?></li>
                                <li><b>Total Fat</b> : <?php echo $fetch_prod ['fld_product_weight'];?></li>
                                <li><b>Minimum Order</b> : <?php echo $fetch_prod ['fld_product_dimension'];?> </li> 
                                <li><b>Calcium</b> : <?php echo $fetch_prod ['fld_product_width'];?></li>
                                <li><b>Cuisine</b> : <?php echo $fetch_prod ['fld_product_colour'];?></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                      <div class="tab-single review-panel">
                        <div class="row">
                          <div class="col-12">
                            <div class="single-des">
                              <?php echo $fetch_prod['fld_product_compatibility'];?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
<?php }?>
    <?php include'footer.php';?>

    