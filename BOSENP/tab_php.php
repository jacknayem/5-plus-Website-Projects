<?php
  require_once 'core/dbconnection.php';
  include 'include/head.php';
  include 'include/navigation.php';
?>
<?php
$tab_query = "SELECT * FROM menu_list WHERE parent='menu'";
$tab_result = mysqli_query($conn, $tab_query);
$tab_menu = '';
$tab_content = '';
$i = 0;
while($row = mysqli_fetch_array($tab_result))
{
   if($i == 0)
     {
      $tab_menu .= '<li class="active"><a href="#'.$row["id"].'" data-toggle="tab">'.$row["name"].'</a></li>';
      $tab_content .= '<div id="'.$row["id"].'" class="tab-pane fade in active">';
     }
   else
     {
      $tab_menu .= '<li><a href="#'.$row["id"].'" data-toggle="tab">'.$row["name"].'</a></li>';
      $tab_content .= '<div id="'.$row["id"].'" class="tab-pane fade">';
     }
    $product_query = "SELECT * FROM menu_list WHERE parent = '".$row["name"]."'";
    $product_result = mysqli_query($conn, $product_query);
    while($sub_row = mysqli_fetch_array($product_result))
     {
      $tab_content .= '
      <div class="col-md-3" style="margin-bottom:36px;">
       <h4>'.$sub_row["name"].'</h4>
      </div>
      ';
     }
     $tab_content .= '<div style="clear:both"></div></div>';
   $i++;
}
?>
  <div class="container">
   <h2 align="center">Create Dynamic Tab by using Bootstrap in PHP Mysql</a></h2>
   <br />
   <ul class="nav nav-tabs">
     <?php
     echo $tab_menu;
     ?>
   </ul>
    <div class="tab-content">
     <br />
     <?php echo $tab_content;?>
   </div>
  </div>
 </body>
</html>