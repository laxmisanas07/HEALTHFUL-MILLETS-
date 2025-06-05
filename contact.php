<?php include'config.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us - E-Commerce.com</title>
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
                  <a href="#">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
        $row=mysqli_query($connect,"select * from tbl_my_profile order by fld_id asc ") or die(mysqli_error($connect));
        
        $fetch=mysqli_fetch_array($row); 
    ?>
    <section id="contact-us" class="contact-us section">
      <div class="container">
        <div class="contact-head">
          <div class="row">
            <div class="col-lg-8 col-12">
              <div class="form-main">
                <div class="title">
                  <h4>Get in touch</h4>
                  <h3>Write us a message</h3>
                </div>
                <form class="form" method="post"  id="contact-form">
                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <div class="form-group">
                        <label>Your Name <span>*</span>
                        </label>
                        <input name="name" type="text" placeholder="" required>
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="form-group">
                        <label>Your Subjects <span>*</span>
                        </label>
                        <input name="subject" type="text" placeholder="" required>
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="form-group">
                        <label>Your Email <span>*</span>
                        </label>
                        <input name="email" type="email" placeholder="" required>
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="form-group">
                        <label>Your Phone <span>*</span>
                        </label>
                        <input name="mobile" type="text" placeholder="" requiredvalue="<?php echo $fld_mobile; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" minlength="10">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group message">
                        <label>Your message <span>*</span>
                        </label>
                        <textarea name="message" placeholder="" required></textarea>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group button">
                        <button type="submit" class="btn" name="send">Send Message</button>
                      </div>
                    </div>
                    <div class="col-12 my-2">
                      <div class="form-messege text-success"></div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-4 col-12">
              <div class="single-head">
                <div class="single-info">
                  <i class="fal fa-phone"></i>
                  <h4 class="title">Call us Now:</h4>
                  <ul>
                    <li><?php echo $fetch['fld_phone'];?></li>
                  </ul>
                </div>
                <div class="single-info">
                  <i class="fal fa-envelope"></i>
                  <h4 class="title">Email:</h4>
                  <ul>
                    <li>
                      <a href="#">
                        <span ><?php echo $fetch['fld_email'];?></span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="single-info">
                  <i class="fal fa-map-marker-alt"></i>
                  <h4 class="title">Our Address:</h4>
                  <ul>
                    <li><?php echo $fetch['fld_address'];?></li>
                    <div class="map-section">
         <?php echo $fetch['fld_google_map'];?>
        </div>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
        </body></html>


        <?php if(isset($_POST['send']))          
            {
                
                $to="singhrahul1242@gmail.com";
                 $msgg=nl2br("Enquiry recived from , \n\n Name : ".$_POST['name']." \n\n Email : ".$_POST['email']." \n\n Contact No : ".$_POST['mobile']." \n\n  Subject : ".$_POST['subject']." \n\n  Message : ".$_POST['message']." ");
                $strSubject='Enquiry recived from contact us page';
                $message = '<p>'.$msgg.'</p>' ;              
                $headers = 'MIME-Version: 1.0'."\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                $headers .= "From:". $_POST['email']; 
                $mail_sent=mail($to, $strSubject, $message, $headers);  
                if($mail_sent) 
                {
                    echo '<script type="text/javascript">;';
                    echo "alert('Thank You For Contacting Us ! We Will Contact you soon');";
                    echo '</script>'; 
                }
                else
                {
                    echo '<script type="text/javascript">;';
                    echo "alert('Something Error. Please try Again');";
                    echo '</script>'; 
                }
            } 
        ?>
     <script src="assets/js/shopifyWidget.js"></script>   
    <?php include'footer.php';?>