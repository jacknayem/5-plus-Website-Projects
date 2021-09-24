<?php
	require_once 'core/dbconnection.php';
	include 'include/head.php';
	include 'include/navigation.php';
?>



<!-- =================This month specials===================	 -->
<section class="sections section_color">
		<div class="container">
			<div class="row">
				<div class="head_title text-center wow slideInLeft" data-wow-duration="1.5s">
					<h2>This month specials</h2>
					<div class="separetor"></div>
				</div>
				<div class="main_special text-center wow slideInUp" data-wow-duration="3s">
					<?php 
						$sql= "SELECT * FROM gallery_month_specials";
						$spe_gallery = mysqli_query($conn,$sql);
					?>
					<?php while( $food_spe=mysqli_fetch_assoc($spe_gallery)) : ?>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="admin/<?= $food_spe['image'] ?>" alt="month_specials" />
							<div class="single_special_overlay text-center">
								<h3><?= $food_spe['fname'] ?></h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p><?= $food_spe['fprice'] ?>$</p>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
</section>

<!-- ================Photo Gallary===================== -->
<section id="photo_gallery" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Photo Gallery</h1>
				<hr>
			</div>
			<?php 
				$sql= "SELECT * FROM photo_gallery";
				$pho_gallery = mysqli_query($conn,$sql);
			?>
			<?php while( $food_pho=mysqli_fetch_assoc($pho_gallery)) : ?>
			<div class="col-md-4 col-sm-4 wow fadeInUp transparent_text" data-wow-delay="0.3s" data-wow-duration="2s">
				<img src="admin/<?= $food_pho['image'] ?>" alt="gallery img" >
				<div class="content text-center">
				    <h3><?= $food_pho['fname'] ?></h3>
				    <p><?= $food_pho['fdiscription'] ?></p>
  				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>


	
	
<section id="abouts" class="abouts sections">
	<div class="container">
		<div class="row">
			<div class="main_abouts">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="single_abouts wow slideInLeft" data-wow-duration="2s">
						<div class="head_title text-center">
							<h2>Great Time</h2>
							<div class="separetor"></div>
						</div>
						
						<p>We provide you fresh food, properly prepared, suitable price and you can enjoyed perfect wait service. So this is the great time enjoy yourself.</p>
						<div class="signature_img text-right">
							<img src="images/signature.png" alt="" />
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="single_abouts wow slideInRight" data-wow-duration="2s">
						<img src="images/abimg.png" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
	include 'include/detailsmodel.php';
	include 'include/footer.php';
?>