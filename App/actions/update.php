<?php 
	
	
	$form_data = array(
		"id" 			=> 1234,
		"warehouse_id" 	=> 2,
		"name" 			=> "Iphone6",
		"photo" 		=>"iphone.png",
		"stock_balance" => 4,
		"price" 		=> 139,
		"description" 	=> "Lorem ipsum"
		
	);

	$url = 'http://localhost/item-api/api/item/update.php';
	
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "URL");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
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

 