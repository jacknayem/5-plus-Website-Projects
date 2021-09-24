<?php 
	function display_errors($errors){
		$display = '<ul class="bg-danger">';
		foreach($errors as $error) {
			$display .= '<li class="text-white">'.$error.'</li>';
		}
		$display .= '</ul>';
		return $display;
	}
 ?>