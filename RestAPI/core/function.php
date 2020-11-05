<?php 
// check and clean some illegal text and white space for preventing injection
	function clean_input($input){

		$input = trim($input);
		$input = htmlspecialchars(strip_tags($input));

		return $input;
	}
 ?>