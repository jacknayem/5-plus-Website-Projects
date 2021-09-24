<!DOCTYPE html>
<html>
<head>
<?php 
	// connection with database
	include 'require/dbconnection.php';
?>
	<title>Staff Welcome Center</title>
<?php
	// head tag
	include 'include/head.php';
	// First nav bar
	include 'include/firstnavbar.php';
	// Second vab bar
	include 'include/secondnavbar.php';
?>
<section class="container">
	<div class="carousel slide" data-ride="carousel" id="staff_welcome_carousel">
		<ol class="carousel-indicators">
			<li data-target="#staff_welcome_carousel" data-side-to="0" class="active"></li>
			<li data-target="#staff_welcome_carousel" data-side-to="1"></li>
			<li data-target="#staff_welcome_carousel" data-side-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/staff/staff_welcome1.png" class="d-block h-100 w-100">
				<div class="carousel-caption d-none d-md-block text-dark">
					<h1 ></h1>
					<h3></h3>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/staff/staff_welcome.png" class="d-block h-100 w-100">
				<div class="carousel-caption d-none d-md-block">
					<h1 >Strong Unity</h1>
					<h3>Staff unity is most important</h3>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/staff/staff_welcome2.png" class="d-block h-100 w-100">
				<div class="carousel-caption d-none d-md-block ">
					<h1 >Strong Unity</h1>
					<h3>Welcome in our university</h3>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#staff_welcome_carousel"  role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">previous</span>
		</a>
		<a href="#staff_welcome_carousel" class="carousel-control-next" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</section>

<section class="container">
	<div class="row">
		<div class="col-md-4 faculty-message text-white pt-5 text-center">
			<h1>Gateway for Staff</h1>
			<p class="pt-4">Links to resources, offices and services that support our university staff</p>
		</div>
		<div class="col-md-8 stafflogin">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="" method="post" class="p-2 px-3 my-3" >
						<div class="form-group">
							<label>Faculty ID</label>
							<input type="text" name="staffloginid" id="staffloginid" class="form-control" placeholder="Enter your ID" required value="">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="Password" name="staffloginpassword" id="staffloginpassword" class="form-control" placeholder="Enter Your Password" required value="">
						</div>
						<div class="d-flex felx-row">
							<div class="form-group form-check flex-fill">
								<input type="checkbox" name="remamber" class="form-check-input" <?php if(isset($_COOKIE["staff_ID_number"])) { ?> checked <?php } ?> />Remamber me
							</div>

							<div class="flex-fill">
								<a href="#" role="button" data-toggle="modal" data-target="#staffForgatePass">Forget Password</a>
							</div>
						</div>
						<button type="submit" class="btn btn-primary" name="facultyLoginsubmit" id="facultyLoginsubmit">Log In</button>
						<p class="text-center py-2"><a href="#" role="button" data-toggle="modal" data-target="#staffSignUp">Create your Account</a></p>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
	<!-- The modal for forget password -->
	<div class="modal fade" id="staffForgatePass">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Password Recovery</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" class="p-2" id="stfForgetpassFrom">
						<div class="form-group">
							<label for="stfForgatedID" class="text-white">ID:</label>
							<input type="text" name="stfForgatedID" id="stfForgatedID" class="form-control mb-3">
							<div class="d-flex justify-content-end">
								<div id="stfForgetID_error_message"></div>
							</div>

							<label for="stfForgetedemail" class="text-white">Email: </label>
							<input type="email" name="stfForgetedemail" class="form-control mb-3" id="stfForgetedemail">
							<div class="d-flex justify-content-end">
								<div id="stfForgetEmail_error_message"></div>
							</div>

							<div class="d-flex justify-content-end">
								<button type="submit" class="btn btn-primary mt-3" name="stfForgetSubmit" id="stfForgetSubmit">Submit</button>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- The modal for sign Up -->

	<div class="modal fade" id="staffSignUp">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Sign Up</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" class="staffsignupform">
						<div class="form-group">
							<label for="stffirstname">First Name<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="stffirstname" id="stffirstname" class="form-control" placeholder="Enter Your First Name">
							<div class="d-flex justify-content-end">
								<span class="stffname-erro-message"></span>
							</div>

							<label for="stflastname">Last Name<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="stflastname" id="stflastname" class="form-control" placeholder="Enter Your Last Name">
							<div class="d-flex justify-content-end">
								<span class=" stflname-erro-message"></span>
							</div>

							<label for="stfSignUpid">ID<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="stfid" id="stfSignUpid" class="form-control ">
							<div class="d-flex justify-content-end">
								<span class="stfId-erro-message"></span>
							</div>

							<label for="stfBirthDate">Date of Birth<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="date" name="stfbirthdate" id="stfBirthDate" class="form-control">
							<div class="d-flex justify-content-end">
								<span class="stfbirth-erro-message"></span>
							</div>

							<label for="stfSignUpEmail">Email<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="email" name="stfSignUpEmail" id="stfSignUpEmail" class="form-control" placeholder="Enter Your Email">
							<div class="d-flex justify-content-end">
								<span class="stfemail-erro-message"></span>
							</div>

							<label for="stfPassword">Password<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="password" name="stfpassword" id="stfPassword" class="form-control" placeholder="Enter Password">
							<div class="d-flex justify-content-between mt-1">
								<div class="progress w-50 sighup_pass_progressbar" >
									<div class="progress-bar passprogbar">
									</div>
								</div>
								<div class="msg">
									<span class="stfpass-error-message"></span>
								</div>
							</div>

							<label for="stfConfirmPassword">Confirm Password<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="password" name="stfconfirmpassword" id="stfConfirmPassword" class="form-control " placeholder="Enter Confirm Password">
							<div class="d-flex justify-content-end md-3">
								<div>
									<span id="conPassMsg" class="stfconpass-error-message"></span>
								</div>
							</div>
							
							<div class="alert alert-warning">
						    	<strong>Warning!</strong>You Must Complete full input field
						  </div>
							<button type="reset" class="btn btn-danger mt-2 mr-2 stfultysignupReset">Reset</button>
							<button type="submit" name="StaffSignUpSubmit" class="btn btn-info mt-2 ml-2">Submit</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</section>

<section class="container">
	<div id="stfmainBody">
		<div class="d-flex flex-row">
		<ul class="nav nav-tabs" role="navigation">
			<li class="nav-item">
				<a href="#beforArrive" class="nav-link active" data-toggle="tab" role="tab" aria-controls="beforArive">Before You Arrive</a>
			</li>
			<li class="nav-item">
				<a href="#firstDay" class="nav-link" data-toggle="tab" role="tab" aria-controls="firstDay">Your First Day</a>
			</li>
			<li class="nav-item">
				<a href="#day2Beyond" class="nav-link" data-toggle="tab" role="tab" aria-controls="day2Beyond">Day Two & Beyond</a>
			</li>
			<li class="nav-item">
				<a href="#triAndComp" class="nav-link" data-toggle="tab" role="tab" aria-controls="triAndComp">Training & Compliance</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade show active" id="beforArrive" role="tabpanel">
				<div>
					<h4 class="text-center">Before You Arrive</h4>					
					<p class="text-center">We are excited you’ve joined Stamford and look forward to seeing you on your first day at the Welcome Center. Before then, there are required steps for you to complete, to ensure you’ll be set up and ready to participate fully during orientation.</p>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Required Steps</b></p>
						<p class="read-more">Complete these required steps prior to your first day. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Additional Information</b></p>
						<p class="read-more">We encourage you to review this additional information prior to your first day.The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Recommended Videos</b></p>
						<p class="read-more">Recommended Videos as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="firstDay" role="tabpanel">
				<div>
					<h4 class="text-center">Your First Day</h4>					
					<p class="text-center">You will spend your first day at the Welcome Center, which is designed to ensure you have a smooth transition into your new role, and help you feel prepared and informed as you begin your career at Stamford.</p>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Agenda</b></p>
						<p class="read-more">Preview the topics that will be covered on your first day at the Welcome Center. Access your "All Learning" page in STARS to see the courses you may have already been assigned, and consult with your supervisor about additional training assignments and other courses you may need to complete. when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>What to Bring</b></p>
						<p class="read-more">There are a few important items you need to bring with you to the Welcome Center on your first day. has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Directions</b></p>
						<p class="read-more">The Cardinal at Work Welcome Center is located off the main campus in what's considered Stanford's south campus. when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="day2Beyond" role="tabpanel">
				<div>
					<h4 class="text-center">Day Two & Beyond</h4>					
					<p class="text-center">We hope you found your orientation at the Welcome Center valuable, and that you are feeling supported and productive in your new role. Take full advantage of these additional resources and tools during your first few days and weeks at Stamford.</p>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Stay Connected</b></p>
						<p class="read-more">This is a collection of the most popular online resources and tools for new hires to stay connected.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Stay Engaged</b></p>
						<p class="read-more">Get the most out of your employee experience by staying informed and engaged using these channels.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Stay Enriched</b></p>
						<p class="read-more">Stanford is committed to providing enriching programs to support you and the work you do. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="triAndComp" role="tabpanel">
				<div>
					<h4 class="text-center">Training & Compliance</h4>					
					<p class="text-center">Stanford requires completion of specific trainings, as well as provides you with a wealth of guides and resources to enhance your career and to remain compliant for the work that your perform at Stamford.</p>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Required Training</b></p>
						<p class="read-more">All employees are required to complete specific training for the work they perform at Stanford. Access your "All Learning" page in STARS to see the courses you may have already been assigned, and consult with your supervisor about additional training assignments and other courses you may need to complete. when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Policies & Documents</b></p>
						<p class="read-more">These state, federal and university policies and documents may affect you or come in handy now or in the future. We recommend you familiarize yourself with them. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Administrative Guide</b></p>
						<p class="read-more">The Administrative Guide is Stanford's collection of guidelines for non-research university activities that govern workplace interactions, approaches, and processes. when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div id="stfmainBody2">
		<div class="accordion">
	 		<div class="panel-group">
			    <div class="panel panel-default my-1">
			      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#befArri" data-parent=".accordion">
			      	<div class="d-flex justify-content-between">
			      		<div>Before You Arrive</div>
			      	<div class="text-right"><i class="fas fa-plus"></i></div>
			      	</div>
			      </div>
			      <div class="panel-body collapse mx-1 p-4 div_collaple" id="befArri"><div>
					<h4 class="text-center">Before You Arrive</h4>					
					<p class="text-center">We are excited you’ve joined Stamford and look forward to seeing you on your first day at the Welcome Center. Before then, there are required steps for you to complete, to ensure you’ll be set up and ready to participate fully during orientation.</p>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Required Steps</b></p>
						<p class="read-more">Complete these required steps prior to your first day. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Additional Information</b></p>
						<p class="read-more">We encourage you to review this additional information prior to your first day.The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div>

				<div class="d-flex justify-content-start div_color my-1">
					<div><i class="far fa-file-alt p-2"></i></div>
					<div>
						<p class="m-0"><b>Recommended Videos</b></p>
						<p class="read-more">Recommended Videos as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</div></div>
			    </div>
			    <div class="panel panel-default my-1">
			      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#firDay" data-parent=".accordion">
			      	<div class="d-flex justify-content-between">
			      		<div>Your First Day</div>
			      	<div class="text-right"><i class="fas fa-plus"></i></div>
			      	</div>
			      </div>
			      <div class="panel-body collapse mx-1 p-4 div_collaple" id="firDay">firDay</div>
			    </div>
			    <div class="panel panel-default my-1">
			      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#daytobeyond" data-parent=".accordion">
			      	<div class="d-flex justify-content-between">
			      		<div>Day Two & Beyond</div>
			      	<div class="text-right"><i class="fas fa-plus"></i></div>
			      	</div>
			      </div>
			      <div class="panel-body collapse mx-1 p-4 div_collaple" id="daytobeyond">daytobeyond</div>
			    </div>
			    <div class="panel panel-default my-1">
			      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#triCom" data-parent=".accordion">
			      	<div class="d-flex justify-content-between">
			      		<div>Training & Compliance</div>
			      	<div class="text-right"><i class="fas fa-plus"></i></div>
			      	</div>
			      </div>
			      <div class="panel-body collapse mx-1 p-4 div_collaple" id="triCom">triCom</div>
			    </div>
			</div>
	 	</div>
	</div>
</section>
<?php
 	include 'include/footer.php';
?>