<?php 
    require_once 'core/dbconnection.php';
    include 'include/header.php';
    $destination='';
    $sql= "SELECT * FROM gallery_month_specials";
    $mon_spe_menu = mysqli_query($conn,  $sql);
    $errors = array();

    // delete item
    if(isset($_GET['delete']) && !empty($_GET['delete'])) {
        $delete_id = (int)$_GET['delete'];
        $del= "DELETE FROM gallery_month_specials WHERE id = '$delete_id'";
        $delitem = mysqli_query($conn,  $del);
        header('Location:month_special.php');
        }
    //edit item
    if(isset($_GET['edit']) && !empty($_GET['edit'])) {
        $edit_id = (int)$_GET['edit'];
        echo $edit_id;
        $edit= "SELECT * FROM gallery_month_specials WHERE id='$edit_id'";
        $edititem = mysqli_query($conn,$edit);
        $eitem = mysqli_fetch_assoc($edititem);
        if (isset($_GET['delete_image'])) {
            // $image_url=$_SERVER['DOCUMENT_ROOT'].'/'.$eitem['image'];
            // echo $image_url;
            // unlink($image_url);
            $sql="UPDATE gallery_month_specials SET image='' WHERE id='$edit_id'";
            $qry = mysqli_query($conn,  $sql);
            header('Location:month_special.php?edit='.$edit_id);

        }
    }


    if(isset($_POST['m_specialitem']))
        {
            $food_n = $_POST['food'];

            // cehck if it is blank
            if ($_POST['food'] == '') {
               $errors[] .= 'You must enter your full information!'; 
            }


            // check if it is exixt
            $sql= "SELECT * FROM gallery_month_specials WHERE fname = '$food_n'";
            if (isset($_GET['edit'])) {
                $sql= "SELECT * FROM gallery_month_specials WHERE fname = '$food_n' AND id != '$edit_id'";
            }
            $spe_menu = mysqli_query($conn,  $sql);
            $count = mysqli_num_rows($spe_menu);
            if ($count > 0) {
                $errors[] .= $food.' is already exist,Please choose another item...';
            }

            // display error
            if (!empty($errors)) {
                echo display_errors($errors);
            }else{
                $name       = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['image']['name']);
                $destination     = "images/month_specials/".$name;
                $filename        = $_FILES['image']['tmp_name'];
                $upload_file = move_uploaded_file($filename, $destination);
                if($upload_file)
                {
                    $sql="INSERT INTO gallery_month_specials(image, fname, fdiscription, fprice) VALUES ('$destination','$_POST[food]','$_POST[discription]','$_POST[price]')";
                }
                if (isset($_GET['edit'])) {
                        $exiting_file = $eitem['image'];
                        if ($eitem['image'] == '') {
                            $sql="UPDATE gallery_month_specials SET image='$destination', fname='$_POST[food]', fdiscription='$_POST[discription]', fprice='$_POST[price]' WHERE id='$edit_id'";
                        }
                        else{
                            $sql="UPDATE gallery_month_specials SET image='$exiting_file', fname='$_POST[food]', fdiscription='$_POST[discription]', fprice='$_POST[price]' WHERE id='$edit_id'";
                        }
                    }
                $qry = mysqli_query($conn,  $sql);
                header('Location:month_special.php');
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
                <div class="col-md-3 col border border-1">
                    <h2 class="text-center p-3"><?=((isset($_GET['edit']))?'Edit':'Add')?> Item</h2>
                    <hr class="mt-0">
                    <form class="form-group pl-4 pr-4 pb-4 pt-0" action="month_special.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="POST" enctype="multipart/form-data">
                        <?php 
                        $s_food_image = '';
                        $food_name='';
                        $food_discription='';
                        $food_price ='';
                        if(isset($_GET['edit'])){
                            $s_food_image = (($eitem['image'] != '')?$eitem['image']:'');
                            $food_name = $eitem['fname'];
                            $food_discription = $eitem['fdiscription'];
                            $food_price = $eitem['fprice'];
                        }else{
                            if(isset($_GET['food'])) {
                                $s_food_image = $eitem['image'];
                                $food_name = $_POST['food'];
                                $food_discription = $_POST['discription'];
                                $food_price = $_POST['price'];
                            }
                        }
                        ?>
                        <?php if($s_food_image != ''): ?>
                            <div class="s-food-image">
                                <img src="<?=$s_food_image?>" height="100px">
                                <a href="month_special.php?delete_image=1&edit=<?=$edit_id;?>" class="text-danger">Delete Image</a>
                            </div>
                        <?php else: ?>
                        <label for="image" class="mt-2 mb-0">Upload:</label>
                        <input type="file" name="image" id="image" class="form-control" >
                        <?php endif; ?>
                        <label for="food" class="mt-2 mb-0">Food Name:</label>
                        <input type="text" class="form-control" id="food" placeholder="Enter food" name="food" value="<?=$food_name;?>" >

                        <label for="discription" class="mt-2 mb-0">Discription:</label>
                        <textarea name="discription" rows="4" class="form-control" id="discription" placeholder="Enter discription" value="Testing"><?=$food_discription;?></textarea>

                        <label for="Price" class="mt-2 mb-0">Price:</label>
                        <input type="Price" class="form-control" id="Price" placeholder="Enter Price" name="price" value="<?=$food_price;?>">

                        <?php if(isset($_GET['edit'])): ?>
                            <a href="month_special.php" class="btn btn-dark mt-1">Cancel</a>
                        <?php endif; ?>
                        <input type="submit" value="<?=((isset($_GET['edit']))?'Edit':'Add')?> Item" class="btn btn-primary mt-1" name="m_specialitem">
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
                            <?php while( $mfood=mysqli_fetch_assoc($mon_spe_menu)) : ?>
                          <tr>
                            <td><a href="month_special.php?edit=<?= $mfood['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-edit"></i></button></a></td>
                            <td><img src="<?= $mfood['image'] ?>" height="35%"></td>
                            <td><?= $mfood['fname'] ?></td>
                            <td><?= $mfood['fdiscription'] ?></td>
                            <td>&euro;<?= $mfood['fprice'] ?></td>
                            <td><a href="month_special.php?delete=<?= $mfood['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-close"></i></button></a></td>
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