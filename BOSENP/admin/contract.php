<?php 
    require_once 'core/dbconnection.php';
    include 'include/header.php';
    $destination='';
    $sql1= "SELECT * FROM newsletter_mail";
    $newsletter = mysqli_query($conn,  $sql1);

    $sql= "SELECT * FROM chefs_info";
    $chefs = mysqli_query($conn,  $sql);
    $errors = array();

    // delete item
    if(isset($_GET['delete']) && !empty($_GET['delete'])) {
        $delete_id = (int)$_GET['delete'];
        $del= "DELETE FROM chefs_info WHERE id = '$delete_id'";
        $delitem = mysqli_query($conn,  $del);
        header('Location:contract.php');
        }


    //edit item
    if(isset($_GET['edit']) && !empty($_GET['edit'])) {
        $edit_id = (int)$_GET['edit'];
        $edit= "SELECT * FROM chefs_info WHERE id='$edit_id'";
        $edititem = mysqli_query($conn,$edit);
        $eitem = mysqli_fetch_assoc($edititem);
        if (isset($_GET['delete_image'])) {
            // $image_url=$_SERVER['DOCUMENT_ROOT'].'/'.$eitem['image'];
            // echo $image_url;
            // unlink($image_url);
            $sql="UPDATE chefs_info SET image='' WHERE id='$edit_id'";
            $qry = mysqli_query($conn,  $sql);
            header('Location:contract.php?edit='.$edit_id);

        }
    }


    if(isset($_POST['chefs_info']))
        {
            $c_name = $_POST['name'];

            // cehck if it is blank
            if ($c_name == '') {
               $errors[] .= 'You must enter your full information!'; 
            }


            // check if it is exixt
            $sql= "SELECT * FROM chefs_info WHERE name = '$c_name'";
            if (isset($_GET['edit'])) {
                $sql= "SELECT * FROM chefs_info WHERE name = '$c_name' AND id != '$edit_id'";
            }
            $ch_info = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($ch_info);
            echo $count;
            if ($count > 0) {
                $errors[] .= $food.' is already exist,Please choose another item...';
            }

            // display error
            if (!empty($errors)) {
                echo display_errors($errors);
            }else{
                $name       = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['image']['name']);
                $destination     = "images/chefs/".$name;
                $filename        = $_FILES['image']['tmp_name'];
                $upload_file = move_uploaded_file($filename, $destination);
                 echo "I am testing 1";
                if($upload_file)
                {
                    echo "I am testing";
                    $sql="INSERT INTO chefs_info(name, position, email, image) VALUES ('$_POST[name]','$_POST[position]','$_POST[email]', '$destination')";
                }
                if (isset($_GET['edit'])) {
                        $exiting_file = $eitem['image'];
                        if ($eitem['image'] == '') {
                            $sql="UPDATE chefs_info SET name='$_POST[name]', position='$_POST[position]', email='$_POST[email]', image='$destination' WHERE id='$edit_id'";
                        }
                        else{
                            $sql="UPDATE chefs_info SET name='$_POST[name]', position='$_POST[position]', email='$_POST[email]', image='$exiting_file' WHERE id='$edit_id'";
                        }
                    }
                $qry = mysqli_query($conn,  $sql);
                header('Location:contract.php');
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
            <div class="my-5">
                <h1 class="text-center">Newsletter</h1>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-dark table-hover text-left ">
                            <thead>
                              <tr>
                                <th>Email</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php while( $n_letter=mysqli_fetch_assoc($newsletter)) : ?>
                              <tr>
                                <td><?= $n_letter['email'] ?></td>
                                <td><a href="contract.php?delete=<?= $n_letter['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-close"></i></button></a></td>
                              </tr>
                              <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <form class="form-group pl-4 pr-4 pb-4 pt-0 bg-dark text-white" action="contract.php" method="POST" enctype="multipart/form-data">

                            <label for="food" class="mt-2 mb-0">To:</label>
                            <input type="email" class="form-control" id="to" placeholder="Enter Email" name="food">

                            <label for="newsletter" class="mt-2 mb-0">Message:</label>
                            <textarea name="newsletter" rows="6" class="form-control" id="newsletter" placeholder="Enter newsletter"></textarea>

                            <input type="submit" value="Send" class="btn btn-primary mt-1" name="send_email">
                        </form>
                    </div>
                </div>
            </div>
            <div class="row flex-fill justify-content-around">
                <div class="col-md-3 col border border-1">
                    <h2 class="text-center p-3"><?=((isset($_GET['edit']))?'Edit':'Add')?> Item</h2>
                    <hr class="mt-0">
                    <form class="form-group pl-4 pr-4 pb-4 pt-0" action="contract.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="POST" enctype="multipart/form-data">
                        <?php 
                        $chef_name='';
                        $chef_position='';
                        $chef_email ='';
                        $s_image = '';
                        if(isset($_GET['edit'])){                            
                            $chef_name = $eitem['name'];
                            $chef_position = $eitem['position'];
                            $chef_email = $eitem['email'];
                            $s_image = (($eitem['image'] != '')?$eitem['image']:'');
                        }else{
                            if(isset($_GET['food'])) {                                
                                $chef_name = $_POST['name'];
                                $chef_position = $_POST['position'];
                                $chef_email = $_POST['email'];
                                $s_image = $eitem['image'];
                            }
                        }
                        ?>
                        <label for="name" class="mt-2 mb-0">Chefs Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?=$chef_name;?>" >

                        <label for="position" class="mt-2 mb-0">Position:</label>
                        <input type="text" class="form-control" id="position" placeholder="Enter position" name="position" value="<?=$chef_position;?>">

                        <label for="email" class="mt-2 mb-0">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?=$chef_email;?>">

                        <?php if($s_image != ''): ?>
                            <div class="s-food-image">
                                <img src="<?=$s_image?>" height="100px">
                                <a href="contract.php?delete_image=1&edit=<?=$edit_id;?>" class="text-danger">Delete Image</a>
                            </div>
                        <?php else: ?>
                        <label for="image" class="mt-2 mb-0">Upload Image:</label>
                        <input type="file" name="image" id="image" class="form-control" >
                        <?php endif; ?>

                        <?php if(isset($_GET['edit'])): ?>
                            <a href="contract.php" class="btn btn-dark mt-1">Cancel</a>
                        <?php endif; ?>
                        <input type="submit" value="<?=((isset($_GET['edit']))?'Edit':'Add')?> Item" class="btn btn-primary mt-1" name="chefs_info">
                    </form>
                </div>
                <div class="col-md-9 colsm-12">
                    <h1 class="text-center pt-2">Month Specials</h1>
                    <hr>
                    <table class="table table-dark table-hover text-center ">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php while( $chef=mysqli_fetch_assoc($chefs)) : ?>
                          <tr>
                            <td><a href="contract.php?edit=<?= $chef['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-edit"></i></button></a></td>
                            <td><?= $chef['name'] ?></td>
                            <td><?= $chef['position'] ?></td>
                            <td>&euro;<?= $chef['email'] ?></td>
                            <td><img src="<?= $chef['image'] ?>" class="rounded-circle" alt="" width="100" height="100"></td>
                            <td><a href="contract.php?delete=<?= $chef['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-close"></i></button></a></td>
                          </tr>
                          <?php endwhile; ?>
                        </tbody>
                    </table>
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