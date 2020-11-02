<?php 
	
	
	$form_data = array(
		"id" 			=> 1234,
	);

	$url = 'http://localhost/item-api/api/item/delete.php';
	
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
		    echo "$result<br>";
	}

 ?>

 