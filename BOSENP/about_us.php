<?php
    require_once 'core/dbconnection.php';
    include 'include/head.php';
    include 'include/navigation.php';
?>      

<!-- ====================Newsletter========================== -->
<section id="newsletter" class="newsletter text-center">
    <div class="container">
        <div class="row">
            <div class="main_newsletter">
                <div class="col-sm-12">
                    <div class="single_newsletter_head">
                        <h2 class="wow fadeInDownBig" data-wow-duration="1.5s">JOIN OUR NEWSLETTER</h2>
                        <p class="wow fadeInLeftBig" data-wow-duration="1.5s">Suspendisse ac nulla eros. Vestibulum elementum placerat erat ac maximus. 
                            Aliquam quis nisi quis arcu dapibus ornare. Donec vel ex urna. Ut in odio ultricies
                            mauris fringilla placerat commodo in augue. </p>
                    </div>
                    <?php
                if(isset($_POST['newsletter']))
                {
                    $sql = "INSERT INTO `newsletter_mail` (`email`)  VALUES ('$_POST[newsletter_email]')";
                    $qry = mysqli_query($conn,  $sql);
                    if(!$qry)
                    {
                        echo "Already exist";
                    }
                }
                ?>
                    <div class="single_sewsletter_content">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-group" method="POST" enctype="multipart/form-data">
                                    <div>
                                        <input type="Email" class="input_mail wow fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay="1s" name="newsletter_email" placeholder="Enter your mail" required="">
                                        <input type="submit" value="SUBSCRIBE" name="newsletter" class="btn .btn-default wow fadeInRightBig" data-wow-delay="1s"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- =======================CHEFS INFORMATION============================ -->
<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="main_testimonial">
                <div class="text-center">
                    <h1>CHEFS</h1>
                    <hr>
                </div>
                <div class="col-md-12" data-wow-delay="0.2s">
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active">
                                <img class="img-responsive " src="images/chefs_boy.jpg" alt="">

                            </li>
                            <li data-target="#quote-carousel" data-slide-to="1">
                                <img class="img-responsive" src="images/chefs_boy.jpg" alt="">

                            </li>
                            <li data-target="#quote-carousel" data-slide-to="2">
                                <img class="img-responsive" src="images/chefs_boy.jpg" alt="">

                            </li>
                            <li data-target="#quote-carousel" data-slide-to="3">
                                <img class="img-responsive" src="images/chefs_boy.jpg" alt="">

                            </li>
                        </ol>

                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner text-center">

                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p class="impress">TASIRUL ISLAM PAVEL</p>
                                            <p>Position: Chief</p>
                                            <p>Email: Example@gmail.com</p>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p class="impress">TASIRUL ISLAM PAVEL</p>
                                            <p>Position: Chief</p>
                                            <p>Email: Example@gmail.com</p>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p class="impress">TASIRUL ISLAM PAVEL</p>
                                            <p>Position: Chief</p>
                                            <p>Email: Example@gmail.com</p>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 4 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p class="impress">TASIRUL ISLAM PAVEL</p>
                                            <p>Position: Chief</p>
                                            <p>Email: Example@gmail.com</p>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================COUNTER================================== -->
<section id="counter" class="counter">
    <div class="container-fluid">
        <div class="row">
            <div class="main_counter ">
                <div class="single_left_counter_bg">
                    <div class="col-sm-12 col-xs-12">
                        <div class="single_counter_left">
                            <h2>OUR <br /> NUMBERS <br /> OF COOKING</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 col-xs-12">
                    <div class="single_counter_right_area text-center">
                        <div class="row">
                            <div class="col-sm-4 ">
                                <div class="single_counter_right">
                                    <i class="fa fa-comments-o"></i>
                                    <h2 class="statistic-counter">423</h2>
                                    <p>COMMENTS</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single_counter_right">
                                    <i class="fa fa-life-ring"></i>
                                    <h2 class="statistic-counter">1,423</h2>
                                    <p>RECIPES</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single_counter_right">
                                    <i class="fa fa-heart-o"></i>
                                    <h2 class="statistic-counter">423</h2>
                                    <p>LOVERS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- ==============footer section================= -->
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


        <!-- START SCROLL TO TOP  -->

        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>

    </body>
</html>
