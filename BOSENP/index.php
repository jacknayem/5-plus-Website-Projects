
<?php
	require_once 'core/dbconnection.php';
	include 'include/head.php';
	include 'include/navigation.php';
?>




<!-- ==================home section======================== -->
<section id="home" class="parallax-section">
	<div id ="logotext" class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h3>OSAKA SUSHI ET NAPOLI PIZZA</h3>
				<h2>NOTHING IS BETTER THAN GOING HOME TO FAMILY &amp; EATING GOOD FOOD &amp; RELAXING.</h2>
				<a href="#gallery" class="smoothScroll btn btn-default">LEARN MORE</a>
			</div>
		</div>
	</div>		
</section>


<!-- ===============gallery section===================== -->
<section id="gallery" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Today Gallery</h1>
				<hr>
			</div>
			<?php 
				$sql_left= "SELECT * FROM today_gallery WHERE fnum='1'";
				$today_gallery_left = mysqli_query($conn,$sql_left);
			?>
			<?php 
				$sql_right= "SELECT * FROM today_gallery WHERE fnum='2'";
				$today_gallery_right = mysqli_query($conn,$sql_right);
			?>
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<?php while( $food_pic_left=mysqli_fetch_assoc($today_gallery_left)) : ?>
					<div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="2s">
						<a href="images/gallery-img1.jpg" data-lightbox-gallery="zenda-gallery"><img src="<?=$food_pic_left['image'] ?>" alt="gallery img"></a>
						<div>
							<h3><?= $food_pic_left['fname'] ?></h3>
							<span><?= $food_pic_left['fdiscription'] ?></span>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="2.5s">
						<a href="images/gallery-img3.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/gallery-img3.jpg" alt="gallery img"></a>
						<div>
							<h3>Lemon-Rosemary Bakery</h3>
							<span>Bread / Rosemary / Orange</span>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<?php while( $food_pic_right=mysqli_fetch_assoc($today_gallery_right)) : ?>
						<div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="2s">
							<a href="images/gallery-img1.jpg" data-lightbox-gallery="zenda-gallery"><img src="<?=$food_pic_right['image'] ?>" alt="gallery img"></a>
							<div>
								<h3><?= $food_pic_right['fname'] ?></h3>
								<span><?= $food_pic_right['fdiscription'] ?></span>
							</div>
						</div>
					<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<!-- ==============menu section=================== -->
<section id="menu" class="parallax-section section_color">
	<div class="container">
		<div class="row wow fadeInUp" data-wow-duration="2s">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Special Offer</h1>
				<hr>
			</div>
			<?php 
				$sql= "SELECT * FROM special_offer";
				$spe_menu = mysqli_query($conn,  $sql);

			?>
			<?php while( $food=mysqli_fetch_assoc($spe_menu)) : ?>
				<div class="col-md-6 col-sm-6">
					<a href="#" data-toggle="modal" data-target="#myModal">
						<div class="row" id="bline">
							<div class="col-md-8 col-sm-8">
								<h4><?= $food['fname'] ?></h4>
								<h5><?= $food['fdiscription'] ?></h5>
							</div>
							<div class="col-md-4 col-sm-8">
								<h4>&euro;<?= number_format($food['fprice'],2) ?><sup>now</sup></h4>
								<h5><del><?= number_format($food['fpreprice'],2) ?></del></h5>
							</div>	
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>		


<!-- ================Quality=================== -->
<section id="quality" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">GOOD ONE</h1>
				<hr>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
				<img src="images/fast.png" class="img-responsive center-block" alt="team img">
				<h4>FAST DELIVERY</h4>
				<p>Everything you order at QuickFood will be quickly delivered to your door.</p>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<img src="images/fresh.png" class="img-responsive center-block" alt="team img">
				<h4>FRESH FOOD</h4>
				<p>We use only the best ingredients to cook the tasty fresh food for you.</p>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
				<img src="images/chefs.png" class="img-responsive center-block" alt="team img">
				<h4>EXPERIENCED CHEFS</h4>
				<p>Our staff consists of chefs and cooks with years of experience.</p>
			</div>
		</div>
	</div>
</section>



<!-- ===============contact section================== -->
<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
				<h1 class="heading">Feadback Us</h1>
				<hr>
			</div>
			<div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
				<?php
				if(isset($_POST['submit'])) 
				{
					$sql = "INSERT INTO `feedback` (`name`, `email`, `message`, `date`)  VALUES ('$_POST[name]', '$_POST[email]', '$_POST[message]', NOW())";
					$qry = mysqli_query($conn,  $sql);
				}
				?>
				<?php
					// define variables and set to empty values
					$nameErr = $emailErr = $messageErr = "";
					$name = $email = $message = "";

					if ($_SERVER["REQUEST_METHOD"] == "POST") {
					  if (empty($_POST["name"])) {
					    $nameErr = "Please Enter your Name";
					  } else {
					    $name = test_input($_POST["name"]);
					  }
					  
					  if (empty($_POST["email"])) {
					    $emailErr = "Please Enter you Email";
					  } else {
					    $email = test_input($_POST["email"]);
					  }
					  if (empty($_POST["message"])) {
					    $messageErr = " Plaease Enter you Message";
					  } else {
					    $message = test_input($_POST["message"]);
					  }
					    
					}

					function test_input($data) {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
					}
				?>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<div class="col-md-6 col-sm-6">
						<input name="name" type="text" class="form-control" id="name" placeholder="Name">
						<span class="error"><?php echo $nameErr;?></span>
				  </div>
					<div class="col-md-6 col-sm-6">
						<input name="email" type="email" class="form-control" id="email" placeholder="Email">
						<span class="error"><?php echo $emailErr;?></span>
				  </div>
					<div class="col-md-12 col-sm-12">
						<textarea name="message" rows="8" class="form-control" id="message" placeholder="Message"></textarea>
						<span class="error"><?php echo $messageErr;?></span>
					</div>
					<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
						<input name="submit" type="submit" class="form-control" id="submit" value="Submit">
					</div>
				</form>
			</div>
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>



<?php 
	include 'include/detailsmodel.php';
	include 'include/footer.php';
?>