<?php 
				$sql= "SELECT * FROM special_offer";
				$menu = mysqli_query($conn,  $sql);

?>
<?php while( $food=mysqli_fetch_assoc($menu)) : ?>
	<h5><?= $food['fdiscription'] ?></h5>
<?php endwhile; ?>