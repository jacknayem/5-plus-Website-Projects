<!DOCTYPE html>
<html>
<head>
<?php 
	// connection with database
	include 'require/dbconnection.php';
?>
	<title>Staff</title>
<?php
	// head tag
	include 'include/head.php';
	// First nav bar
	include 'include/firstnavbar.php';
	// Second vab bar
	include 'include/secondnavbar.php';
?>
<section class="container">
	<div class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/staff/president_office.jpg" class="w-100 h-100 d-block" alt="Presodent Office">
				<div class="carousel-caption d-none d-md-block">
					<h1>Office of the President</h1>
				</div>	
			</div>
		</div>
	</div>

	<div class="my-3" id="president_tabs">
		<ul class="nav nav-tabs justify-content-around">
			<li class="nav-item div_color rounded-top"><a href="#home" class="nav-link active" data-toggle="tab">Home</a></li>
			<li class="nav-item div_color rounded-top"><a href="#newsUpdate" class="nav-link" data-toggle="tab">News &amp; Update</a></li>
			<li class="nav-item div_color rounded-top"><a href="#biography" class="nav-link" data-toggle="tab">Biography</a></li>
			<li class="nav-item div_color rounded-top"><a href="#speechesWritings" class="nav-link" data-toggle="tab">Speeches &amp; Writings</a></li>
			<li class="nav-item div_color rounded-top"><a href="#pastPresident" class="nav-link" data-toggle="tab">Past President</a></li>
			<li class="nav-item div_color rounded-top"><a href="#contact" class="nav-link" data-toggle="tab">Contact</a></li>
		</ul>
		<div class="tab-content">
			<div class="px-3 big_div_color tab-pane active" id="home">
				<div class="row justify-content-around py-2">
					<div class="col-md-6">
						<h4 class="p-0 m-0">Letest Message</h4>
						<div class="div_color p-2 m-1 rounded">
							<time>17-jun,2018</time>
							<p>What is Lorem Ipsum?Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
						</div>
						<h4>Update News</h4>
						<div class="div_color p-2 m-1 rounded">
							<div class="d-flex justify-content-start">
								<div class="pr-3">
									<img src="images/staff/news_icon.png" alt="News Iocn" class="img-fluid">
								</div>
								<div>
									<h6 class="p-0 m-0">News Title</h6>
									<time>jan-3,2018</time>
								    <div class="read-more">
								      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
								    </div>      
								</div>
							</div>
						</div>
						<div class="div_color p-2 m-1 rounded">
							<div class="d-flex justify-content-start">
								<div class="pr-3">
									<img src="images/staff/news_icon.png" alt="News Iocn" class="img-fluid">
								</div>
								<div>
									<h6 class="p-0 m-0">News Title</h6>
									<time>jan-3,2018</time>
								    <div class="read-more">
								      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
								    </div>      
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="div_color rounded p-3">
							<img src="images/staff/clock_icon.png" alt="Time Shedule" class="img-fluid rounded-circle">
							<div class="row p-2">
								<div class="div-md-4">
									<div>Sunday:</div>
									<div>Monday:</div>
									<div>Tuesday:</div>
									<div>Wednesday:</div>
									<div>Thursday:</div>
								</div>
								<div class="div-md-4 pl-1">
									<div>8:00 am- 1:00 pm</div>
									<div>10:00 am- 2:00 pm</div>
									<div>10:00 am- 2:00 pm</div>
									<div>10:00 am- 2:00 pm</div>
									<div>10:00 am- 2:00 pm</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="px-3 big_div_color tab-pane fade" id="newsUpdate">
				<div class="row">
					<div class="col-md-7 p-5">
						<div class="div_color p-2 m-1 rounded">
							<div class="d-flex justify-content-start">
								<div class="pr-3">
									<img src="images/staff/news_icon.png" alt="News Iocn" class="img-fluid">
								</div>
								<div>
									<h6 class="p-0 m-0">News Title</h6>
									<time>jan-3,2018</time>
								    <div class="read-more">
								      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
								    </div>      
								</div>
							</div>
						</div>
						<div class="div_color p-2 m-1 rounded">
							<div class="d-flex justify-content-start">
								<div class="pr-3">
									<img src="images/staff/news_icon.png" alt="News Iocn" class="img-fluid">
								</div>
								<div>
									<h6 class="p-0 m-0">News Title</h6>
									<time>jan-3,2018</time>
								    <div class="read-more">
								      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
								    </div>      
								</div>
							</div>
						</div>
						<div class="div_color p-2 m-1 rounded">
							<div class="d-flex justify-content-start">
								<div class="pr-3">
									<img src="images/staff/news_icon.png" alt="News Iocn" class="img-fluid">
								</div>
								<div>
									<h6 class="p-0 m-0">News Title</h6>
									<time>jan-3,2018</time>
								    <div class="read-more">
								      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
								    </div>      
								</div>
							</div>
						</div>
						<div class="div_color p-2 m-1 rounded">
							<div class="d-flex justify-content-start">
								<div class="pr-3">
									<img src="images/staff/news_icon.png" alt="News Iocn" class="img-fluid">
								</div>
								<div>
									<h6 class="p-0 m-0">News Title</h6>
									<time>jan-3,2018</time>
								    <div class="read-more">
								      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
								    </div>      
								</div>
							</div>
						</div>
					</div>
				</div>
				<ul class="pagination justify-content-between p-4">
					<li class="page-item"><a href="javascript:void(0)" class="page-link">Previous</a></li>
					<li class="page-item"><a href="javascript:void(0)" class="page-link">Next</a></li>
				</ul>
			</div>

			<div class="px-3 big_div_color tab-pane fade" id="biography">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<h1>Lee C. Bollinger</h1>
						<figure class="float-right p-4">
							<img src="images/staff/president_biography.jpg" alt="President Picture" class="img-fluid rounded">
							<figcaption class="text-center text-dark"><i>Fig:CSE convocation, 2018</i></figcaption>
						</figure>
						<p class="text-justify">Lee C. Bollinger became Columbia University’s nineteenth president in 2002. Under his leadership, Columbia stands again at the very top rank of great research universities, distinguished by comprehensive academic excellence, historic institutional development, an innovative and sustainable approach to global engagement, and unprecedented levels of alumni involvement and financial stability.
						President Bollinger is Columbia’s first Seth Low Professor of the University, a member of the Columbia Law School faculty, and one of the country’s foremost First Amendment scholars. Each fall semester, he teaches “Freedom of Speech and Press” to Columbia undergraduate and graduate students. His most recent book, Uninhibited, Robust, and Wide-Open: A Free Press for a New Century, has placed Bollinger at the center of public discussion about the importance of global free speech to continued social progress.As president of the University of Michigan, Bollinger led the school’s historic litigation in Grutter v. Bollinger and Gratz v. Bollinger, Supreme Court decisions that upheld and clarified the importance of diversity as a compelling justification for affirmative action in higher education. He speaks and writes frequently about the value of racial, cultural, and socioeconomic diversity to American society through opinion columns, media interviews, and public appearances around the country. Columbia remains one of the most diverse universities among its peer institutions and has seen the number of applicants to Columbia College and the selectivity of admissions at the school reach record levels.
						As Columbia’s president, Bollinger conceived and led the University’s most ambitious expansion in over a century with the creation of the Manhattanville campus in West Harlem, the first campus plan in the nation to receive the U.S. Green Building Council’s highest certification for sustainable development.  An historic community benefits agreement emerging from the city and state review process for the new campus provides Columbia’s local neighborhoods with decades of investment in the community’s health, education and economic growth.</p>
					</div>
				</div>
			</div>

			<div class="p-3 big_div_color tab-pane fade" id="speechesWritings">
				<h3>President Speeches</h3>
				  <div class="row">
				    <div class="col-sm-6">
				      <div class="presidentVideo embed-responsive embed-responsive-16by9">
				        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/EY37Tq2cj7o" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				      </div>
				      <div class="presidentVideo d-none embed-responsive embed-responsive-16by9">
				        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qIRjytgNuhM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				      </div>
				      <div class="presidentVideo d-none embed-responsive embed-responsive-16by9">
				        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/gulzQ_2IyfI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				      </div>
				      <div class="presidentVideo d-none embed-responsive embed-responsive-16by9">
				        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2OOsEjCyaEw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				      </div>
				    </div>
				  </div>
				<div class="row mt-2">
			  		<div class="col-3 videoThum active">
			  			<img src=" images/staff/president_video1.jpg" alt="president_video1" class="speeches img-fluid rounded">
			  		</div>
			  		<div class="col-3 videoThum">
			  			<img src=" images/staff/president_video2.jpg" alt="president_video2" class="speeches img-fluid rounded">
			  		</div>
			  		<div class="col-3 videoThum">
			  			<img src=" images/staff/president_video3.jpg" alt="president_video3" class="speeches img-fluid rounded">
			  		</div>
			  		<div class="col-3 videoThum">
			  			<img src=" images/staff/president_video4.jpg" alt="president_video4" class="speeches img-fluid rounded">
			  		</div>
			  	</div>
			</div>

			<div class="px-3 big_div_color tab-pane fade" id="pastPresident">
				<div class="row">
					<div class="col-md-12">
						<div class="past-president">
							<div class="past-president-item rounded left">
								<div class="content">
									<h4>2008</h4>
									<figure>
										<img src="images/staff/past_president1.jpg" alt="Past President" class="img-fluid rounded-circle">
										<figcaption class="text-center text-muted pt-2"><i>Name: Shohan</i></figcaption>
									</figure>
									<p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								</div>
							</div>
							<div class="past-president-item rounded right">
								<div class="content">
									<h4>1995</h4>
									<figure>
										<img src="images/staff/past_president2.jpg" alt="Past President" class="img-fluid rounded-circle">
										<figcaption class="text-center text-muted pt-2"><i>Name: Shohan</i></figcaption>
									</figure>
									<p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								</div>
							</div>
							<div class="past-president-item rounded left">
								<div class="content">
									<h4>1993</h4>
									<figure>
										<img src="images/staff/past_president3.jpg" alt="Past President" class="img-fluid rounded-circle">
										<figcaption class="text-center text-muted pt-2"><i>Name: Shohan</i></figcaption>
									</figure>
									<p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								</div>
							</div>
							<div class="past-president-item rounded right">
								<div class="content">
									<h4>1990</h4>
									<figure>
										<img src="images/staff/past_president4.jpg" alt="Past President" class="img-fluid rounded-circle">
										<figcaption class="text-center text-muted pt-2"><i>Name: Shohan</i></figcaption>
									</figure>
									<p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="px-3 big_div_color tab-pane fade" id="contact">
				<div class="row justify-content-center">
					<div class="col-md-2 pl-5 pt-5">
						<img src="images/staff/message_icon.png" alt="Contract Info icon" class="img-fluid rounded-circle contact-info mt-5 mr-0 ml-5 pb-0">

						<img src="images/staff/call_icon.png" alt="Contract Info icon" class="img-fluid rounded-circle contact-info mt-3 mr-0 ml-3">

						<img src="images/staff/email_icon.png" alt="Contract Info icon" class="img-fluid rounded-circle contact-info mt-3 mr-0 ml-3">

						<img src="images/staff/location_icon.png" alt="Contract Info icon" class="img-fluid rounded-circle contact-info mt-3 mr-0 ml-5 pt-0">
					</div>
					<div class="col-md-7 pl-0">
						<img src="images/staff/contract_box.png" alt="Contract Box" class="img-fluid" id="contact-info-box">
						<!-- <div class="image-caption ">Fax: 789065</div>
						<div class="image-caption ">Office Number: +8877777</div>
						<div class="image-caption ">Email : message@info.university.com</div> -->
						<div class="image-caption ">
							<address>
								Fax: 789065<br>
								Office Number: +8877777<br>
								Email : message@info.university.com <br>
								University of exaple<br>
								203, A-Building, Roman<br>
								Dhaka, Bangladesh
							</address>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
 

<?php
 	include 'include/footer.php';
?>