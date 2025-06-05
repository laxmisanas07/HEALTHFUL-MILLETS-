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
                  <h4>Update Receipe</h4>
                  <h3></h3>
                </div>
                <?php 
                    $view = mysqli_query($connect,"select * from fld_receipe where id='".$_GET['id']."'") or die (mysqli_error($connect));
                    $fetch=mysqli_fetch_array($view);
                ?>
                <form class="form" method="post"  id="contact-form" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6 col-12">
                      <div class="form-group">
                        <label>Type<span>*</span>
                        </label>
                        <select name="type" id="type" required>
                          <option value="">Select Type</option>
                          <option value="book" <?php if($fetch['type']=='book') { echo "selected"; } ?>>Book</option>
                          <option value="video" <?php if($fetch['type']=='video') { echo "selected"; } ?>>Video</option>
                        </select>                        
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="form-group">
                        <label>Name/Title<span>*</span>
                        </label>
                        <input name="name" type="text" id="nameField" placeholder="Enter Name" value="<?php echo $fetch['name']; ?>" required>
                      </div>
                    </div> 



        <div class="col-lg-12 col-12">
    <div class="form-group" id="itemField">
        <label id="itemLabel"><?php echo ($fetch['type'] == 'book') ? 'Book/PDF' : 'URL'; ?><span>*</span></label>
        <input name="item" type="<?php echo ($fetch['type'] == 'book') ? 'file' : 'url'; ?>" id="fileField" style="display: <?php echo ($fetch['type'] == 'book') ? 'block' : 'none'; ?>;" accept=".pdf">
        <input type="hidden" value="<?php echo $fetch['item']; ?>" name="item_old">
        <input name="item" type="<?php echo ($fetch['type'] == 'video') ? 'url' : 'file'; ?>" id="urlField" style="display: <?php echo ($fetch['type'] == 'video') ? 'block' : 'none'; ?>;" placeholder="Enter URL" value="<?php echo $fetch['item']; ?>">
    </div>
</div>


              

                    <div class="col-12">
                      <div class="form-group button">
                        <button type="submit" class="btn" name="submit">Submit</button>
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
              
            </div>
          </div>
        </div>
      </div>
    </section>
        </body></html>
<?php
            
            if(isset($_POST['submit']))
                                    {
                                        extract($_POST);
                                        
                                        if($type=='book')
                                        {
                                          $item = $_FILES["item"]["name"];
                                          if($item)
                                          {
                                              $target_dir = "assets/book/";           
                                              $item_tmp = $_FILES["item"]["tmp_name"];
                                              $item=uniqid().$item;
                                              move_uploaded_file($item_tmp,$target_dir.$item);
                                          }
                                          else
                                          {
                                            $item = $_POST['item_old'];
                                          }
                                        }

                                        if($type=='video')
                                        {
                                          $item = $_POST['item'];
                                        }


                                    $query = mysqli_query($connect,"update fld_receipe set type = '".$_POST['type']."',name = '".$_POST['name']."',item = '$item' where id='".$_GET['id']."'") or die(mysqli_error($con));
                                       
                                        if($query==1)
                                        {   
                                            echo "<script>";
        echo "alert('Updated Successfully');";
        echo "window.location.href='own_receipe_list.php';";
        echo "</script>";
                                        }
                                        else
                                        {
                                            echo "<script>";
        echo "alert('Error');";
        echo "window.location.href='own_receipe_list.php';";
        echo "</script>";
                                        } 


                                    }
         ?>   
     <script src="assets/js/shopifyWidget.js"></script>   
    <?php include'footer.php';?>


<script>
document.getElementById("type").addEventListener("change", function() {
    var selectedType = this.value;
    var fileField = document.getElementById("fileField");
    var urlField = document.getElementById("urlField");
    
    console.log("Selected Type: ", selectedType);
console.log("File Field: ", fileField);
console.log("URL Field: ", urlField);

    if (selectedType === "book") {
        document.getElementById("itemLabel").innerText = "Book/PDF";
        fileField.style.display = "block";
        fileField.setAttribute("required", "required");
        fileField.setAttribute("accept", ".pdf"); // Set accept attribute for file input
        urlField.removeAttribute("required");
        urlField.style.display = "none";
    } else if (selectedType === "video") {
        document.getElementById("itemLabel").innerText = "URL";
        urlField.style.display = "block";
        urlField.setAttribute("required", "required");
        fileField.removeAttribute("required");
        fileField.style.display = "none";
    } else {
        // If neither book nor video selected, hide both fields
        fileField.removeAttribute("required");
        urlField.removeAttribute("required");
        fileField.style.display = "none";
        urlField.style.display = "none";
    }
});
</script>



