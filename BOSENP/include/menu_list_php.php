<?php 
	$sql= "SELECT * FROM menu_list WHERE parent='menu'";
	$menu = mysqli_query($conn,  $sql);
	$tab_menu = '';
	$tab_content = '';
	$i = 0;
	$j = 0;

	 // while( $menu_list=mysqli_fetch_assoc($menu)) {
	 // 	if($i == 0){
	 // 		echo var_dump($menu_list);
	 // 		$tab_menu .= '<a href="#'.$menu_list["id"].'" class="list-group-item text-center active">'.'<h4>'.$menu_list["name"].'</h4>';
	 // 	}
	 // 	else{
	 // 		$tab_menu .= '<a href="#'.$menu_list["id"].'" class="list-group-item text-center">'.'<h4>'.$menu_list["name"].'</h4>';
	 // 	}
	 // $i++;
	 // }
?>