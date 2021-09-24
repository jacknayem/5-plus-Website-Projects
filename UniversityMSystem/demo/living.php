<!DOCTYPE html>
<html>
<head>
	<title>Living and Dining</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome 5.1.0 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>


</head>
<body>
	<?php include('include/firstnavbar.php');?>
	<?php include('include/secondnavbar.php');?>

    <div>
        <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"><strong><center><span class="title001">Living in Example University</span></center></strong></h1>
        <style type="text/css">
        	.title001{
        		color:skyblue;
        	}
        </style>
    </div>

	<?php include('include/campusnav.php');?>

					<!-- Welcome Board starts -->
<div class="jumbotron list-group-item-primary">
  <h1 class="display-4"><center>The Place Where you're always welcome</center></h1>
  <p class="lead"><center>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</center></p>
</div>
						<!-- Welcome Board ends -->

				<!-- The Row Column Grid starts here -->

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="image/campimg1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/campimg2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/campimg3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<style type="text/css">

  #rowd{
  	margin-top: 20px;
  }          
.d-block {
   height: 300px;
   width: 100%;
  }


  </style>

                <!-- Slide show ends here -->
		</div>
		<div class="col-md-6">
			<h5 style="text-align: justify;">Nearly all undergraduates and more than 60% of graduate students reside in 81 diverse campus housing facilities. Eight dining halls, a teaching kitchen and organic gardens provide the campus community with healthy, sustainable meals.</h5>


				<!-- Popup form starts here -->
		

<!-- Button trigger modal -->

<div class="container">
  <div class="row">
    <div class="col-md-3">
<center><button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Apply For Housing
</button></center>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Housing Application Form</h5>
      </div>
      <div class="modal-body">
        <form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="button" id="form1-btn" class="btn btn-success">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Button trigger modal -->
<div class="col-md-3">
<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Housing Policy for Students
</button></center>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
        	<div class="jumbotron jumbotron-fluid list-group-item-success">
  <div class="container">
    <h3 class="display-4">Policy & Terms</h3>
  </div>
</div>
        </h5>
        
      </div>
      <div class="modal-body">
        Nearly all undergraduates and more than 60% of graduate students reside in 81 diverse campus housing facilities.  Eight dining halls, a teaching kitchen and organic gardens provide the campus community with healthy, sustainable meals. Nearly all undergraduates and more than 60% of graduate students reside in 81 diverse campus housing facilities. Eight dining halls, a teaching kitchen and organic gardens provide the campus community with healthy, sustainable meals. Eight dining halls, a teaching kitchen and organic gardens provide the campus community with healthy, sustainable meals.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>


					<!-- Popup form ends here -->
		</div>
	</div>
	<div class="jumbotron jumbotron-fluid list-group-item-success">
  <div class="container">
    <h1 class="display-4"><center><b>Dining For Everyone</b></center></h1>
    <hr>
    <p class="lead"></p>
  </div>
</div>


	<div class="col-6">
		
	</div>

</div>
				<!-- The Row Column Grid ends here -->


	<?php include('include/head.php');?>
	<?php include('include/footer.php');?>

</body>
</html>