<?php
	require_once 'core/dbconnection.php';
	include 'include/head.php';
	include 'include/navigation.php';
?>

<!-- ===================Food Menu=========================== -->
<section class="section_color">
	<div id="fh5co-menus">
		<div class="container">
			<div class="row text-center fh5co-heading row-padded">
				<div class="col-md-8 col-md-offset-2" >
					<h2 class="heading to-animate wow fadeInLeft" data-wow-duration="1s">Food Menu</h2>
					<p class="sub-heading to-animate wow fadeInRight" data-wow-duration="1s">Good food is healthy food. Food is supposed to sustain you so you can live better, not so you can eat more. Some people eat to live, and some people live to eat.</p>
				</div>
			</div>
			<div class="row">
		        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
		            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
		              <div class="list-group">
			                <?php 
			                	 while( $menu_list=mysqli_fetch_assoc($menu)) {
							 	if($i == 0){

							 		echo '<a href="#'.$menu_list["id"].'" class="list-group-item text-center active">'.'<h4>'.$menu_list["name"].'</h4></a>';
							 		$tab_content .= '<div class="bhoechie-tab-content active">';
							 	}
							 	else{
							 		echo '<a href="#'.$menu_list["id"].'" class="list-group-item text-center">'.'<h4>'.$menu_list["name"].'</h4></a>';
							 		$tab_content .= '<div class="bhoechie-tab-content">';
							 	}
							 	$i++;}
 							?>
		              </div>
		            </div>
		            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
		            	<?php
		            	$tab_query = "SELECT * FROM menu_list WHERE parent='menu'";
						$tab_result = mysqli_query($conn, $tab_query);
		            	while($row = mysqli_fetch_array($tab_result))
						{
							$product_query = "SELECT * FROM menu_list WHERE parent = '".$row["name"]."'";
						    $product_result = mysqli_query($conn, $product_query);
						    if($j == 0)
						    {
						    	echo '<div class="bhoechie-tab-content active">';
						    	while($sub_row = mysqli_fetch_array($product_result)) {
						    	echo '<center><div class="row row-padded ">';
						    	echo '<div class="col-md-6 animated fadeInLeft" data-wow-duration="1s">';
								echo '<div class="fh5co-food-menu"><div class="fh5co-food-desc"><figure><img src="images/res_img_3.jpg" class="img-responsive" alt="Free HTML5 Templates by FREEHTML5.co"></figure><div><h3>'.$sub_row["name"].'</h3><p>'.$sub_row["discription"].'.</p></div></div>';
								echo '<div class="fh5co-food-pricing">'.$sub_row["price"].'</div>';
						    	echo '</div>';
						    	// echo '</div>';
						    	echo '</div></center>';
						    	}
						    	echo '</div>';
						    }
						    else{
						    	echo '<div class="bhoechie-tab-content">';
						    	while($sub_row = mysqli_fetch_array($product_result)) {
						    	echo '<center><div class="row row-padded ">';
						    	echo '<div class="col-md-6 animated fadeInLeft" data-wow-duration="1s">';
								echo '<div class="fh5co-food-menu"><div class="fh5co-food-desc"><figure><img src="images/res_img_3.jpg" class="img-responsive" alt="Free HTML5 Templates by FREEHTML5.co"></figure><div><h3>'.$sub_row["name"].'</h3><p>'.$sub_row["discription"].'.</p></div></div>';
								echo '<div class="fh5co-food-pricing">'.$sub_row["price"].'</div>';
						    	echo '</div>';
						    	// echo '</div>';
						    	echo '</div></center>';
						    	}
						    	echo '</div>';
						    }
						    
						   $j++;
						}
						?>		          	
					</div>
		        </div>
		    </div>
		</div>
	</div>
</section>
<!-- ===================Food quotes========================== -->
<section>
	<div id="fh5co-type" style="background-image: url(images/slide_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="fh5co-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 to-animate wow fadeInDown" data-wow-duration="1s">
					<div class="fh5co-type">
						<h3 class="with-icon icon-1">Drinks</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="col-md-3 to-animate wow fadeInDown" data-wow-duration="2s">
					<div class="fh5co-type">
						<h3 class="with-icon icon-2">Sea food</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="col-md-3 to-animate wow fadeInDown" data-wow-duration="1s">
					<div class="fh5co-type">
						<h3 class="with-icon icon-3">Vegetables</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="col-md-3 to-animate wow fadeInDown" data-wow-duration="2s">
					<div class="fh5co-type">
						<h3 class="with-icon icon-4">Meat</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

			

<!-- ====================footer section======================= -->
<footer class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Contact Info.</h2>
				<div class="ph">
					<p><i class="fa fa-phone"></i> Phone: 090-080-0760</p>
					<p><i class="fa fa-phone"></i> Email: support@Website.com</p>
					<p><i class="fa fa-phone"></i> Fax: +1 (0) 000 0000 002</p>
					<h4></h4>

				</div>
				<div class="address">
					<p><i class="fa fa-map-marker"></i> Our Location</p>
					<h4>120 Duis aute irure, Paris, France</h4>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Open Hours</h2>
					<p>Sunday <span>10:30 AM - 10:00 PM</span></p>
					<p>Mon-Fri <span>9:00 AM - 8:00 PM</span></p>
					<p>Saturday <span>11:30 AM - 10:00 PM</span></p>
					<p>Sunday <span>10:30 AM - 10:00 PM</span></p>
					<p>Mon-Fri <span>9:00 AM - 8:00 PM</span></p>
					<p>Saturday <span>11:30 AM - 10:00 PM</span></p>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Follow Us</h2>
				<ul class="social-icon">
					<li><a href="#" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
					<li><a href="#" class="fa fa-twitter wow bounceIn" data-wow-delay="0.6s"></a></li>
					<li><a href="#" class="fa fa-behance wow bounceIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-dribbble wow bounceIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-github wow bounceIn" data-wow-delay="0.9s"></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>


<!-- =============copyright section================= -->
<section id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h3>RESTAURANT</h3>
				<p>Copyright © Restaurant and Cafe 
                
			</div>
		</div>
	</div>
</section>
<!-- =======================Scrollup========================== -->
<div class="scrollup">
		<a href="#"><i class="fa fa-chevron-up"></i></a>
</div>
</body>
</html>

