<?php include'config.php';	
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>User Register : E-Commerce</title>
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
							<li class="active"><a href="#">User Dashboard</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
  <?php 
     $user_query=mysqli_query($connect,"select * from tbl_user where fld_user_email='".$_SESSION['email']."' ")or die (mysqli_error($connect));

    $fetch=mysqli_fetch_array($user_query);
    extract($fetch);

  ?>
    <section class="shop section">
      <div class="container">
        <div class="row">
         
          <div class="col-lg-12">
            <div class="account-content bg-white pt-0">
              
              
              <div class="profile-details">
                <div class="table-responsive">
                                <table
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Action</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Item</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count = 1;
                                         $view = mysqli_query($connect,"select * from fld_receipe where user_id='".$_SESSION['id']."' order by id desc") or die (mysqli_error($connect));
                                            while ($fetch=mysqli_fetch_array($view))
                                            {
                                                extract($fetch);

                                        ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td> 

                                              <!-- <a href="update_my_receipe.php?id=<?php //echo $fetch['id']; ?>" class="fas fa-edit"  style="blue: red;font-size: 20px;"></a> -->


                                                <a href="receipe_delete.php?id=<?php echo $fetch['id']; ?>" class="fas fa-trash-alt"  style="color: red;font-size: 20px;" onclick="return confirm('Are you sure you want to delete')"></a>
                                            </td>
                                            <td ><?php if($type=='book') { echo 'Book'; } else { echo 'Video'; } ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td>
                                                <?php if($type=='book') 
                                                { 
                                                    ?>
                                                 <a href="../assets/book/<?php echo $item; ?>" class="btn btn-success" download="">Download</a>
                                                    <?php
                                                } 
                                                else 
                                                    { 
                                                        $video_id = ''; // Initialize variable
        preg_match('/(?:https:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([^&]+)/', $item, $matches);
        if(isset($matches[1])) {
            $video_id = $matches[1]; // Extracted video ID
        }
                                                        ?>
                                                        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" allowfullscreen></iframe>
        </div>
        <?php
                                                    } 
                                                ?>
                                            </td>
                                        </tr>
                                       
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                
              </div>
              <!-- <div class="col-12 mt-5">
                <a href="user_profile_update.php" class="profile-btn">Edit Profile</a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>
	<?php include'footer.php';?>
