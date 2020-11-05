<!-- To update the product and send updated data to API -->
<?php 
	//to get some functions
	include_once "function.php";

	// get a POST request from delete.php
	if (isset($_POST['yes'])) {
		echo $id = clean_input($_POST['id']);

		//receive the form data as an array
		$form_data = array(
			"id" => $id,
		);

		//to get scheme from server domain such as http or https
		$scheme = $_SERVER['REQUEST_SCHEME'];

		//to get hosting name from server domain such as localhost
		$host = $_SERVER['HTTP_HOST'];

		//generating API url to connect
		$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/delete.php';

		//using curl ->  command-line tool for sending HTTP requests from the terminal
		//Initializes a new curl session and setting up necessary for DELETE request
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "URL");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($form_data));
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// Execute cURL request and getting a response with JSON format
		$output = curl_exec($ch);
		curl_close($ch);
		 if (empty($output)){
	      print "Nothing returned from API.<br>";
	  	}
		else{
			//decoding the JSON format to get the data as an array
		    $decode = json_decode($output, true);
		    $result = $decode["message"];
		    $enc_res = encrypt_data($result);
			header("location:../index.php?return= $enc_res");

		}
	}
	else{
		header("location:../index.php");
	}

 ?>

 