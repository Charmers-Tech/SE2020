<?php 

	function clean_input($input){

		$input = trim($input);
		$input = htmlspecialchars(strip_tags($input));

		return $input;
	}

	function encrypt_data($input){

		$link = urlencode(base64_encode($input));

		return $link;
	}

	function decrypt_data($input){
		foreach ($_GET as $key => $value) {
			return $_GET[$key] = base64_decode(urldecode($value));
		}
	}
 ?>