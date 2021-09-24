<?php 
    require_once 'core/dbconnection.php';
    include 'include/header.php';
    $sql= "SELECT * FROM special_offer";
    $spe_menu = mysqli_query($conn,  $sql);
    $errors = array();
    // delete item
    if(isset($_GET['delete']) && !empty($_GET['delete'])) {
        $delete_id = (int)$_GET['delete'];
        $del= "DELETE FROM special_offer WHERE id = '$delete_id'";
        $delitem = mysqli_query($conn,  $del);
        header('Location:special_offer.php');
        }
    if(isset($_GET['edit']) && !empty($_GET['edit'])) {
        $edit_id = (int)$_GET['edit'];
        $edit= "SELECT * FROM special_offer WHERE id='$edit_id'";
        $edititem = mysqli_query($conn,$edit);
        $eitem = mysqli_fetch_assoc($edititem);
    }


    if(isset($_POST['specialitem'])) 
        {
            $food = $_POST['food'];
            // cehck if it is blank
            if ($_POST['food'] == '') {
               $errors[] .= 'You must enter your full information!'; 
            }
            // check if it is exixt
            $sql= "SELECT * FROM special_offer WHERE fname = '$food'";
            if (isset($_GET['edit'])) {
                $sql= "SELECT * FROM special_offer WHERE fname = '$food' AND id != '$edit_id'";
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
                $sql="INSERT INTO special_offer(fname, fdiscription, fprice, fpreprice) VALUES ('$_POST[food]','$_POST[discription]','$_POST[price]','$_POST[Pre_Price]')";
                if (isset($_GET['edit'])) {
                    $sql="UPDATE special_offer SET fname = '$food', fdiscription='$_POST[discription]', fprice='$_POST[price]', fpreprice='$_POST[Pre_Price]' WHERE id='$edit_id'";
                }
                $qry = mysqli_query($conn,  $sql);
                header('Location:special_offer.php');
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
                    <form class="form-group pl-4 pr-4 pb-4 pt-0" action="special_offer.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="POST" enctype="multipart/form-data">
                        <?php 
                        $food_name='';
                        $food_discription='';
                        $food_price ='';
                        $food_preprice ='';
                        if(isset($_GET['edit'])){
                            $food_name = $eitem['fname'];
                            $food_discription = $eitem['fdiscription'];
                            $food_price = $eitem['fprice'];
                            $food_preprice = $eitem['fpreprice'];
                        }else{
                            if(isset($_GET['food'])) {
                                $food_name = $_POST['food'];
                                $food_discription = $_POST['discription'];
                                $food_price = $_POST['price'];
                                $food_preprice = $_POST['Pre_Price'];
                            }
                        }
                        ?>
                        <label for="food" class="mt-2 mb-0">Food Name:</label>
                        <input type="text" class="form-control" id="food" placeholder="Enter food" name="food" value="<?=$food_name;?>" >
                        <label for="discription" class="mt-2 mb-0">Discription:</label>
                        <textarea name="discription" rows="4" class="form-control" id="discription" placeholder="Enter discription" value="Testing"><?=$food_discription;?></textarea>
                        <label for="Price" class="mt-2 mb-0">Price:</label>
                        <input type="Price" class="form-control" id="Price" placeholder="Enter Price" name="price" value="<?=$food_price;?>">
                        <label for="Pre-Price" class="mt-2 mb-0">Pre-Price:</label>
                        <input type="text" class="form-control " id="Pre-Price" placeholder="Enter Pre-Price" name="Pre_Price" value="<?=$food_preprice;?>">
                        <?php if(isset($_GET['edit'])): ?>
                            <a href="special_offer.php" class="btn btn-dark mt-1">Cancel</a>
                        <?php endif; ?>
                        <input type="submit" value="<?=((isset($_GET['edit']))?'Edit':'Add')?> Item" class="btn btn-primary mt-1" name="specialitem">
                    </form>
                    <?php
                                              
                    ?>
                </div>
                <div class="col-md-9 colsm-12">
                    <h1 class="text-center pt-2">Spetial Food Item</h1>
                    <hr>
                    <table class="table table-dark table-hover text-center ">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Pre-price</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php while( $food=mysqli_fetch_assoc($spe_menu)) : ?>
                          <tr>
                            <td><a href="special_offer.php?edit=<?= $food['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-edit"></i></button></a></td>
                            <td><?= $food['fname'] ?></td>
                            <td><?= $food['fdiscription'] ?></td>
                            <td>&euro;<?= number_format($food['fprice'],2) ?></td>
                            <td>&euro;<?= number_format($food['fpreprice'],2) ?></td>
                            <td><a href="special_offer.php?delete=<?= $food['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-close"></i></button></a></td>
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