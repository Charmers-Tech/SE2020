<?php 
	
	include_once "function.php";

	if (isset($_POST['yes'])) {
		echo $id = clean_input($_POST['id']);
		
		$form_data = array(
			"id" => $id,
		);

		$scheme = $_SERVER['REQUEST_SCHEME'];
		$host = $_SERVER['HTTP_HOST'];
		$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/delete.php';
		
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "URL");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($form_data));
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		 if (empty($output)){
	      print "Nothing returned from API.<br>";
	  	}
		else{
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

 