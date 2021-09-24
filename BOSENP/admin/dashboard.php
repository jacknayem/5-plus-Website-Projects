<?php 
    require_once 'core/dbconnection.php';
    include 'include/header.php';
?>
<section  class="conternar fluid">
    <div class="row d-flex d-md-block flex-nowrap">
        <?php 
            include 'include/navigation.php';
        ?>
        <div class="col-md-10 col px-5 pl-md-2 pt-2 mx-auto flex-collume float-right">
            <div class="row jumbotron p-3 m-0">
                <header class=" col-md-2 col-3">
                    <a href="#" data-target="#sidebar" data-toggle="collapse" aria-expanded="false"><i class="fa fa-navicon fa-2x py-2 p-1"></i></a>
                </header>
                <div class="col-md-10 ml-0">
                    <div class="float-right" id="signout_button">
                      <button type="button" class="btn btn-secondary btn-sm mt-1"><i class="fa fa-bell pr-1"></i>Notification</button>
                      <button type="button" class="btn btn-secondary btn-sm mt-1 "><i class="fa fa-gear pr-1"></i>Setting</button>
                      <button type="button" class="btn btn-secondary btn-sm mt-1"><i class="fa fa-sign-out pr-1"></i>Sign Out</button>
                    </div>
                </div>
                
            </div>
            <div class="row flex-fill justify-content-around">
                <div class="col-md-3 col col-sm-4 mb-2">
                    <div class="card bg-info text-white">
                        <div class="card-body text-center">
                            <h4 >
                                <i class="fa fa-truck fa-3x d-inline-block"></i>
                                <span class="count">10468</span>
                            </h4>
                            <p class="text-light">Total Delivery</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 mb-2">
                    <div class="card bg-info text-white">
                        <div class="card-body text-center">                            
                            <h4 >
                                <i class="fa fa-user fa-3x d-inline-block"></i>
                                <span class="count">10468</span>
                            </h4>
                            <p class="text-light">Members online</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 mb-2">
                    <div class="card bg-info text-white">
                        <div class="card-body text-center">
                            <h4 >
                                <i class="fa fa-usd fa-3x d-inline-block"></i>
                                <span class="count">10468</span>
                            </h4>
                            <p class="text-light">Total Income</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>