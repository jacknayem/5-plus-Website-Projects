<!-- ======================Model=========================== -->
<section class="container">
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-title text-center">
            	<h4>Modal Header</h4>
            	<p>Check if restaurant is delivering to</p>
            </div>
            

              <form class="form-inline text-center" action="/action_page.php" method="post">
			    <div class="form-group">
			      <input type="text" class="form-control" placeholder="Enter your street address" name="email">
			    </div>
			    <button type="submit" class="btn btn-info">CHECK NOW</button>
			  </form>
          </div>
          <div class="modal-body">
          	<div class="container-fluid">
          		<div class="row">
	          		<div class="col-sm-6">
	          			<img src="images/Hamburger.jpg" class="img-thumbnail img-responsive">
	          		</div>
	          		<div class="col-sm-6">
	          			<h4>Details</h4>
	          			<p>Chicken Jamboo burger</p>
	          			<hr>
	          			<p>Per Piece Price: $10</p>
	          			<form  class="form-inline" action="add_card.php" method="post">
						    <div class="form-group">
						      <label for="quantity">Quantity:</label>
						      <input type="quantity" class="form-control" placeholder="Enter number" name="quantity">
						    </div>
						</form>
	          		</div>
          		</div>          		
          	</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-shopping-cart"></span>Add Card</button>
          </div>
        </div>
        
      </div>
    </div> 
</section>