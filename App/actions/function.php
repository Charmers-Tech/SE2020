<?php 
// check and clean some illegal text and white space for preventing injection
	function clean_input($input){

		$input = trim($input);
		$input = htmlspecialchars(strip_tags($input));

		return $input;
	}
// to get encrypt data for get request
	function encrypt_data($input){

		$link = urlencode(base64_encode($input));

		return $link;
	}
// to get decrypt data from get request
	function decrypt_data($input){
		foreach ($_GET as $key => $value) {
			return $_GET[$key] = base64_decode(urldecode($value));
		}
	}
 ?>