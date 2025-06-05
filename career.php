<?php include'config.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Careers - E-Commerce.com</title>
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
        $view_item = mysqli_query($connect,"select * from tbl_careers order by fld_careers_id asc") or die (mysqli_error($connect));

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
                  <a href="#">Careers</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="shop login section">
      <div class="container">
      	<center><h2>Careers</h2></center>
        <div class="my-4">
          <?php echo $fetch_item['fld_careers_description'];?>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="login-form">
              <h2>Application</h2>
             <form method="POST" class="form" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Your Name<span>*</span></label>
                      <input type="text" name="user_name" placeholder="Enter Your Name" required="required"> </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Your Email<span>*</span></label>
                      <input type="email" name="email" placeholder="Enter Your Email" required="required"> </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Phone Number<span>*</span></label>
                      <input type="text" name="phone" placeholder="Enter Your Phone Number" required="required"  maxlength="10" minlength="10" pattern="[6-9]{1}[0-9]{9}"  maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Highest Qualification<span>*</span></label>
                      <input type="text" name="qualification" placeholder="ex- B.E. , B.Tech , Diploma etc." required="required"> </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Post Applied For?<span>*</span></label>
                      <input type="text" name="post" placeholder="Enter Post Name" required="required"> </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Attach Resume / C.V. (Max 5 MB)<span>*</span></label>
                      <input class="form-control" type="file" name="fld_resume" id="fld_resume" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1');" accept=" .pdf , .docx " onchange="return fileValidation()">
                      <span style="color: red;" >Please upload Form pdf, docx Format.</span>  </div>
                  </div>

                    <script>
                        function fileValidation() {
                            var fileInput =
                                document.getElementById('fld_resume');

                                var filePath = fileInput.value;

                                // Allowing file type 
                                var allowedExtensions =
                                    /(\.pdf|\.docx)$/i;

                                if (!allowedExtensions.exec(filePath)) {
                                    alert('Invalid type');  
                                    fileInput.value = '';
                                    return false;
                                }
                            }
                    </script>
                  <div class="col-2 mx-auto">
                    <div class="form-group login-btn">
                      <button class="btn" name="submit" type="submit">Send</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


<?php
 
    if(isset($_POST['submit']))
    {
        extract($_POST);
        $name=$_FILES['fld_resume']['name'];
        $size=$_FILES['fld_resume']['size'];
        $type=$_FILES['fld_resume']['type'];
        $temp=$_FILES['fld_resume']['tmp_name'];

        if($name)
            {
               $upload= "images/user/resume/";
              $imgExt=strtolower(pathinfo($name, PATHINFO_EXTENSION));
              $valid_ext= array('pdf','docx');
              $stud_photo= rand(1000,1000000).".".$imgExt;
              move_uploaded_file($temp,$upload.$stud_photo);

            } 

            $query="INSERT into tbl_resume(fld_student_name,fld_student_email,fld_student_phone,fld_student_qualification,fld_student_post_name,fld_student_resume) VALUES('$user_name','$email','$phone','$qualification','$post','$stud_photo') ";
      
            $add=mysqli_query($connect,$query) or die(mysqli_error($connect));
             
            if($add)
            {
               echo '<script type="text/javascript">';
               echo " alert('Record Send Successfully');";
               echo 'window.location.href = "career.php";';
               echo '</script>';
      
            }
            else
            {
               echo '<script type="text/javascript">';
               echo "alert(' Not Update');";
               echo '</script>';
            }              
    }

?>


    <?php include'footer.php';?>

   

