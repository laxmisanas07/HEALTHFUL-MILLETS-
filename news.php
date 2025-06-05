<?php include'config.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>About Us - Ecommerce .com</title>
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
     <?php 
        $view_item = mysqli_query($connect, "SELECT * FROM tbl_news WHERE fld_link_delete = '0' ORDER BY news_id ASC") or die (mysqli_error($connect));

        
    ?>
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
                <li class="active">
                  <a href="#">Letest News</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="about-us section">
      <div class="container">
       
        <div class="row">
          <?php
          while($fetch_item=mysqli_fetch_array($view_item))
          {
            ?>
          <div class="col-lg-4 col-4">
            <div class="about-content">
              <h3><span><?php echo $fetch_item['fld_heding'];?> </span>
              </h3>
          <h4><a href="<?php echo $fetch_item['fld_link'];?>">Click Here</a></h4>  
            </div>
          </div>
        <?php } ?>
        </div><br>
      </div>
    </section>
    <?php include'footer.php';?>