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
        $view_item = mysqli_query($connect, "SELECT * FROM fld_receipe WHERE type='book' and is_approved = 'yes' ORDER BY id ASC") or die (mysqli_error($connect));

        $fetch_item=mysqli_fetch_array($view_item);
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
                  <a href="#">Reciepe Books</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="about-us section">
      <div class="container">
        <a href="https://millet.pythonanywhere.com/" target="_blank" rel="noopener noreferrer">
  <center><button class="button-33" role="button" style="
    background-color: #c2fbd7;
    border-radius: 100px;
    box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
    color: green;
    cursor: pointer;
    display: inline-block;
    font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
    padding: 15px 40px; /* increased padding */
    text-align: center;
    text-decoration: none;
    transition: all 250ms;
    border: 0;
    font-size: 20px; /* increased font size */
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
  ">Recipe AI</button></center>
</a>


        <div class="row">
          <div class="col-lg-4 col-4">
            <div class="about-content">
            <h3><span><?php if(!empty($fetch_item['name'])) { echo $fetch_item['name']; } ?> </span></h3>
          <h4><a href="assets/book/<?php echo $fetch_item['item']; ?>" class="btn btn-success" download="">Download</a></h4>  
            </div>
          </div>
        </div><br>
      </div>
    </section>
    <?php include'footer.php';?>