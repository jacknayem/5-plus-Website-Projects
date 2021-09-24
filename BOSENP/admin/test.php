<?php 
    require_once 'core/dbconnection.php';
    include 'include/header.php';

    $sql= "SELECT * FROM menu_list WHERE parent='menu'";
    $menu = mysqli_query($conn,  $sql);
    $tab_menu = '';
    $tab_content = '';
    $i = 0;
    $j = 0;
    $errors = array();

    // delete item
    if(isset($_GET['delete']) && !empty($_GET['delete'])) {
        $delete_id = (int)$_GET['delete'];
        $del= "DELETE FROM menu_list WHERE id = '$delete_id'";
        $delitem = mysqli_query($conn,  $del);
        header('Location:test.php');
        }
    //edit item
    if(isset($_GET['edit']) && !empty($_GET['edit'])) {
        $edit_id = (int)$_GET['edit'];
        $edit= "SELECT * FROM menu_list WHERE id='$edit_id'";
        $edititem = mysqli_query($conn,$edit);
        $eitem = mysqli_fetch_assoc($edititem);
    }


    if(isset($_POST['m_specialitem']))
        {
            $food_n = $_POST['food'];

            // cehck if it is blank
            if ($_POST['food'] == '') {
               $errors[] .= 'You must enter your full information!'; 
            }


            // check if it is exixt
            $sql= "SELECT * FROM menu_list WHERE name = '$food_n'";
            if (isset($_GET['edit'])) {
                $sql= "SELECT * FROM menu_list WHERE name = '$food_n' AND id != '$edit_id'";
            }
            $spe_menu = mysqli_query($conn,  $sql);
            $count = mysqli_num_rows($spe_menu);
            if ($count > 0) {
                $errors[] .= $food_n.' is already exist,Please choose another item...';
            }

            // display error
            if (!empty($errors)) {
                echo display_errors($errors);
            }else{
                $sql="INSERT INTO menu_list(name, discription, price, parent) VALUES ('$_POST[food]','$_POST[discription]','$_POST[price]','$_POST[c_name]')";
                if (isset($_GET['edit'])) {
                        $sql="UPDATE menu_list SET name='$_POST[food]', discription='$_POST[discription]', price='$_POST[price]', parent='$_POST[c_name]' WHERE id='$edit_id'";
                    }
                $qry = mysqli_query($conn,  $sql);
                header('Location:test.php');
            }
        }

        //edit item
        if(isset($_GET['edit_ctg']) && !empty($_GET['edit_ctg'])) {
            $category_id = (int)$_GET['edit_ctg'];
            echo $category_id;
            $edi_c= "SELECT * FROM menu_list WHERE id='$category_id'";
            $edit_cg = mysqli_query($conn,$edi_c);
            $e_ctg = mysqli_fetch_assoc($edit_cg);
        }

        // insert category
        if(isset($_POST['category']))
        {
            $food_c = $_POST['category_n'];

            // cehck if it is blank
            if ($food_c == '') {
               $errors[] .= 'You must enter name of category name!'; 
            }

             // check if it is exixt
            $sql= "SELECT * FROM menu_list WHERE name = '$food_c'";
            if (isset($_GET['edit_ctg'])) {
                $sql= "SELECT * FROM menu_list WHERE name = '$food_n' AND id != '$category_id'";
            }
            $spe_menu = mysqli_query($conn,  $sql);
            $count = mysqli_num_rows($spe_menu);
            if ($count > 0) {
                $errors[] .= $food_c.' is already exist,Please choose another name..!';
            }

            // display error
            if (!empty($errors)) {
                echo display_errors($errors);
            }else{
                $sql="INSERT INTO menu_list(name, parent) VALUES ('$_POST[category_n]','menu')";
                if (isset($_GET['edit_ctg'])) {
                        $sql="UPDATE menu_list SET name='$_POST[category_n]' WHERE id='$category_id'";
                    }
                $qry = mysqli_query($conn,  $sql);
                header('Location:test.php');
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
                <div class="col-md-5 col border border-1">
                     <h2 class="text-center p-3"><?=((isset($_GET['edit_ctg']))?'Edit':'Add')?> Category</h2>
                    <hr class="mt-0">
                    <form class="form-group pl-4 pr-4 pb-4 pt-0" action="test.php<?=((isset($_GET['edit_ctg']))?'?edit_ctg='.$category_id:'');?>" method="POST" enctype="multipart/form-data">
                        <?php 
                        $food_category='';
                        if(isset($_GET['edit_ctg'])){
                            $food_category = $e_ctg['name'];
                        }else{
                            if(isset($_POST['category_n'])) {
                                $food_category = $_POST['category_n'];
                            }
                        }
                        ?>
                        <label for="category_n" class="mt-2 mb-0">Category Name:</label>
                        <input type="text" class="form-control" id="category_n" placeholder="Enter category" name="category_n" value="<?=$food_category;?>" >

                        <?php if(isset($_GET['edit_ctg'])): ?>
                            <a href="test.php" class="btn btn-dark mt-1">Cancel</a>
                        <?php endif; ?>
                        <input type="submit" value="<?=((isset($_GET['edit_ctg']))?'Edit':'Add')?> Category" class="btn btn-primary mt-1" name="category">
                    </form>
                    <div class="scrolable">
                        <table class="table table-dark table-hover text-center ">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Name</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql= "SELECT * FROM menu_list WHERE parent='menu'";
                                     $menu_li = mysqli_query($conn,  $sql);
                                 ?>
                                <?php while($item_name = mysqli_fetch_array($menu_li)) : ?>
                              <tr>
                                <td><a href="test.php?edit_ctg=<?= $item_name['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-edit"></i></button></a></td>
                                <td><?= $item_name['name'] ?></td>
                                <td><a href="test.php?delete=<?= $item_name['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-close"></i></button></a></td>
                              </tr>
                              <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-7 col border border-1">
                    <h2 class="text-center p-3"><?=((isset($_GET['edit']))?'Edit':'Add')?> Item</h2>
                    <hr class="mt-0">
                    <form class="form-group pl-4 pr-4 pb-4 pt-0" action="test.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="POST" enctype="multipart/form-data">
                        <?php 
                        $food_name='';
                        $food_discription='';
                        $food_price ='';
                        $item_category = '';
                        if(isset($_GET['edit'])){
                            $food_name = $eitem['name'];
                            $food_discription = $eitem['discription'];
                            $food_price = $eitem['price'];
                            $item_category = $eitem['parent'];
                        }else{
                            if(isset($_GET['food'])) {
                                $food_name = $_POST['food'];
                                $food_discription = $_POST['discription'];
                                $food_price = $_POST['price'];
                                $item_category = $_POST['c_name'];
                            }
                        }
                        ?>
                        <label for="food" class="mt-2 mb-0">Food Name:</label>
                        <input type="text" class="form-control" id="food" placeholder="Enter food" name="food" value="<?=$food_name;?>" >

                        <label for="discription" class="mt-2 mb-0">Discription:</label>
                        <textarea name="discription" rows="4" class="form-control" id="discription" placeholder="Enter discription" value="Testing"><?=$food_discription;?></textarea>

                        <label for="price" class="mt-2 mb-0">Price:</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" value="<?=$food_price;?>" >

                        <label for="parent" class="mt-2 mb-0">Category Name:</label>
                        <input list="parents" class="form-control" id="parent" name="c_name" placeholder="Select category from this list" value="<?=$item_category;?>">
                        <datalist id="parents">
                        <?php 
                            $sql= "SELECT * FROM menu_list WHERE parent='menu'";
                            $cetegory = mysqli_query($conn,  $sql);
                        ?>
                        <?php while( $cetegory_list=mysqli_fetch_assoc($cetegory)) : ?>
                          <option value="<?= $cetegory_list['name'] ?>">
                        <?php endwhile; ?>
                        </datalist>

                        <?php if(isset($_GET['edit'])): ?>
                            <a href="test.php" class="btn btn-dark mt-1">Cancel</a>
                        <?php endif; ?>
                        <input type="submit" value="<?=((isset($_GET['edit']))?'Edit':'Add')?> Item" class="btn btn-primary mt-1" name="m_specialitem">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container fluid">
    <h1 class="text-center pt-4">Food Item By categorise</h1>
    <hr>
    <div class="row pt-3">
        <div class="col-lg-12 p-0 rounded bg-white bhoechie-tab-container">
            <div class="row">
                <div class="col-md-3 pl-0 pr-0 pb-0 bhoechie-tab-menu">
                  <div class="list-group mb-0">
                    <?php while( $menu_list=mysqli_fetch_assoc($menu)) : ?>
                        <?php if($i == 0): ?>
                            <a href="#" class="list-group-item active text-center mb-0">
                              <h4><?= $menu_list["name"] ?></h4>
                            </a>
                        <?php else: ?>
                            <a href="#" class="list-group-item text-center mb-0">
                              <h4><?= $menu_list["name"] ?></h4>
                            </a>
                        <?php endif; ?>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                  </div>
                </div>
                <div class="col-md-9 bhoechie-tab">
                    <?php 
                        $sql= "SELECT * FROM menu_list WHERE parent='menu'";
                        $menu = mysqli_query($conn,  $sql);
                     ?>
                    <?php while( $menu_m=mysqli_fetch_assoc($menu)) : ?>
                        <?php 
                            $item = "SELECT * FROM menu_list WHERE parent = '".$menu_m["name"]."'";
                            $menu_item = mysqli_query($conn, $item);
                         ?>
                    <?php if($j == 0): ?>
                    <div class="bhoechie-tab-content active">
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
                                <?php while($items = mysqli_fetch_array($menu_item)) : ?>
                              <tr>
                                <td><a href="test.php?edit=<?= $items['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-edit"></i></button></a></td>
                                <td><img src="../images/res_img_3.jpg" height="60px" width="120px"></td>
                                <td><?= $items['name'] ?></td>
                                <td><?= $items['discription'] ?></td>
                                <td><?= $items['price'] ?></td>
                                <td><a href="test.php?delete=<?= $items['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-close"></i></button></a></td>
                              </tr>
                              <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="bhoechie-tab-content">
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
                                <?php while($items = mysqli_fetch_array($menu_item)) : ?>
                              <tr>
                                <td><a href="test.php?edit=<?= $items['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-edit"></i></button></a></td>
                                <td><img src="../images/res_img_3.jpg" height="60px" width="120px"></td>
                                <td><?= $items['name'] ?></td>
                                <td><?= $items['discription'] ?></td>
                                <td><?= $items['price'] ?></td>
                                <td><a href="test.php?delete=<?= $items['id']; ?>"><button class="btn btn-sm btn-default"><i class="fa fa-close"></i></button></a></td>
                              </tr>
                              <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                        <?php endif; ?>
                        <?php $j++; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>