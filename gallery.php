  <?php include'config.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gallery</title>
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
                <li class="active">
                  <a href="#">Letest News</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<section class="small-banner section">
      <div class="container">
        <div class="row">
          <?php 
              $view2 = mysqli_query($connect,"select * from tbl_photo where fld_photo_delete=0 order by fld_photo_id desc") or die (mysqli_error($connect));

              while ($fetch2=mysqli_fetch_array($view2))
              {
                  extract($fetch2);
          ?>
<div class="col-lg-4 col-md-4 col-md-4 col-12" style="padding-bottom: 50px;">
    <div class="single-banner">
        <img src="images/gallery/<?php echo $fld_photo ?>" alt="#">
    </div>
</div>

        <?php }?>
        </div>
      </div>
    </section>
<br>
    <?php include'footer.php';?>