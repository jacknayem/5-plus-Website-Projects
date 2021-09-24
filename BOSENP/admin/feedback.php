<?php 
    require_once 'core/dbconnection.php';
    include 'include/header.php';
    $sql= "SELECT * FROM feedback";
    $feedback = mysqli_query($conn,  $sql);
    $errors = array();
    // delete item
    if(isset($_GET['delete']) && !empty($_GET['delete'])) {
        $delete_id = (int)$_GET['delete'];
        $del= "DELETE FROM feedback WHERE id = '$delete_id'";
        $delitem = mysqli_query($conn,  $del);
        header('Location:feedback.php');
        }

    if(isset($_POST['feedback_button'])) 
        {
            $email = $_POST['email'];
            // cehck if it is blank
            if ($_POST['email'] == '') {
               $errors[] .= 'You must enter Email!'; 
            }
        }
?>
<section  class="conternar fluid">
    <div class="row d-flex d-md-block flex-nowrap">
        <?php 
            include 'include/navigation.php';
        ?>
        <div class="col-md-10 col px-5 pl-md-2 pt-2 mx-auto flex-collume">
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
                <div class="col-md-8 col-sm-12">
                    <h1 class="text-center pt-2 d-flex justify-content-around">Visitor &amp; Customer Feedback</h1>
                    <hr>
                    <table class="table table-dark table-hover text-center ">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>FeedBack</th>
                            <th>Feedback Date</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php while( $ffeedback=mysqli_fetch_assoc($feedback)) : ?>
                          <tr>
                            <td><?= $ffeedback['name'] ?></td>
                            <td><?= $ffeedback['email'] ?></td>
                            <td><?= $ffeedback['message'] ?></td>
                            <td><?= $ffeedback['date'] ?></td>
                            <td><a href="feedback.php?delete=<?= $ffeedback['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-close"></i></button></a></td>
                          </tr>
                          <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 col border border-1">
                    <h2 class="text-center p-3 d-flex justify-content-around">Answer Of feedback</h2>
                    <hr class="mt-0">
                    <form class="form-group pl-4 pr-4 pb-4 pt-0" action="feedback.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="POST" enctype="multipart/form-data">
                        <?php 
                        $femail='';
                        if(isset($_GET['edit'])){
                            $femail = $eitem['email'];
                        }else{
                            if(isset($_GET['email'])) {
                                $femail = $_POST['email'];
                            }
                        }
                        ?>
                        <label for="food" class="mt-2 mb-0">To :</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?=$femail;?>" >
                        <label for="answer" class="mt-2 mb-0">Write Answer:</label>
                        <textarea name="answer" rows="6" class="form-control" id="answer" placeholder="Write Answer"></textarea>
                        <?php if(isset($_GET['edit'])): ?>
                            <a href="feedback.php" class="btn btn-dark mt-1">Cancel</a>
                        <?php endif; ?>
                        <input type="submit" value="SEND" class="btn btn-primary mt-1" name="feedback_button">
                    </form>
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