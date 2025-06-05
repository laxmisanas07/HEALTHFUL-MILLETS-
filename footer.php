<?php
    $query="select * from tbl_my_profile order by fld_id asc ";
    $row=mysqli_query($connect,$query) or die(mysqli_error($connect));
    
    while($fetch=mysqli_fetch_array($row)) {

    extract($fetch);
            
?>

	<footer class="footer">
	  <div class="footer-top section">
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-5 col-md-6 col-12">
	          <div class="single-footer about">
	            <div class="logo">
	              <a href="#">
	                <img width="250" src="images/<?php echo $fetch['fld_logo'];?>" alt="#">
	              </a>
	            </div>
	            <p class="text"><?php echo $fetch['fld_description'];?></p>
	            <p class="call">Have Any Question? Call Us 24/7 <span>
	                <a href="tel:<?php echo $fetch['fld_phone'];?>"><?php echo $fetch['fld_phone'];?></a>
	              </span>
	            </p>
	          </div>
	        </div>
	        <div class="col-lg-3 col-md-6 col-12">
	          <div class="single-footer links">
	            <h4>Information</h4>
	            <ul>
	              <li>
	                <a href="about_us.php">About Us</a>
	              </li>
	              <li>
	                <a href="privacy_policy.php">Privacy Policy</a>
	              </li>
	              <li>
	                <a href="term_condition.php">Terms & Conditions</a>
	              </li>
	              <li>
	                <a href="refund_policy.php">Returns & Refund Policy</a>
	              </li>
	              <!-- <li>
	                <a href="career.php">Careers</a>
	              </li> -->
	              <li>
	                <a href="contact.php">Contact Us</a>
	              </li>
	            </ul>
	          </div>
	        </div>
<!-- 	        <div class="col-lg-2 col-md-6 col-12">
	          <div class="single-footer links">
	            <h4>My Account</h4>
	            <?php 
                  if(isset($_SESSION['email']))
                  {
                ?>
		            <ul>
		              <li>
		                <a href="user_dashboard.php">My Account</a>
		              </li>
		              <li>
		                <a href="order_list.php">Order History</a>
		              </li>
		              <li>
		                <a href="wishlist_view.php">Wishlist</a>
		              </li>
		              <li>
		                <a href="cart.php">Cart</a>
		              </li>
		              <li>
		                <a href="user_profile_update.php">Profile Info</a>
		              </li>
		              <li>
		                <a href="logout.php">Logout</a>
		              </li>
		            </ul>
	            <?php }
                  else{
                ?>
                  <ul>
		              <li>
		                <a href="#">My Account</a>
		              </li>
		              <li>
		                <a href="#">Order History</a>
		              </li>
		              <li>
		                <a href="#">Wishlist</a>
		              </li>
		              <li>
		                <a href="#">Cart</a>
		              </li>
		              <li>
		                <a href="#">Profile Info</a>
		              </li>
		              <li>
		                <a href="#">Login</a>
		              </li>
	            	</ul>
                  <?php }?>
	          </div>
	        </div> -->
	        <div class="col-lg-3 col-md-6 col-12">
	          <div class="single-footer social">
	            <h4>Get In Tuch</h4>
	            <div class="contact">
	              <ul>
	                <li>
	                  <i class="fal fa-map-marker-alt"></i> <?php echo $fetch['fld_address'];?>
	                </li>
	                <li>
	                  <i class="fal fa-envelope"></i>
	                  <?php echo $fetch['fld_email'];?>
	                </li>
	                <li>
	                  <i class="fal fa-phone"></i> <?php echo $fetch['fld_phone'];?>
	                </li>
	              </ul>
	            </div>
	            <ul>
	              <li>
	                <a href="<?php echo $fetch['fld_facebook'];?>">
	                  <i class="fab fa-facebook-f"></i>
	                </a>
	              </li>
	              <li>
	                <a href="<?php echo $fetch['fld_twitter'];?>">
	                  <i class="fab fa-twitter"></i>
	                </a>
	              </li>
	              <li>
	                <a href="<?php echo $fetch['fld_whatsapp_link'];?>">
	                  <i class="fab fa-whatsapp"></i>
	                </a>
	              </li>
	              <li>
	                <a href="<?php echo $fetch['fld_instagram'];?>">
	                  <i class="fab fa-instagram"></i>
	                </a>
	              </li>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="copyright">
	    <div class="container">
	      <div class="inner">
	        <div class="row">
	          <div class="col-lg-12 col-12">
	            <div>
	              <p style="text-align: center;">Copyright © <?php  
 
$year = date("Y");  
  
// Display the year 
echo $year;  
  
?>  <?php echo $fetch['fld_copyright'];?></p>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</footer>
<?php }?>
	<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.6.0.min.js"></script>
	<script src="assets/js/jquery-ui.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/slicknav.min.js"></script>
	<script src="assets/js/owl-carousel.js"></script>
	<script src="assets/js/magnific-popup.js"></script>
	<script src="assets/js/facnybox.min.js"></script>
	<script src="assets/js/waypoints.min.js"></script>
	<script src="assets/js/finalcountdown.min.js"></script>
	<!-- <script src="assets/js/nicesellect.js"></script> -->
	<script src="assets/js/ytplayer.min.js"></script>
	<script src="assets/js/flex-slider.js"></script>
	<script src="assets/js/scrollup.js"></script>
	<script src="assets/js/onepage-nav.min.js"></script>
	<script src="assets/js/easing.js"></script>
	<script src="assets/js/main.js"></script>

</body>
</html>