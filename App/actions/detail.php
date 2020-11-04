<?php 

if (isset($_GET['id'])) {

		$id = decrypt_data(clean_input($_GET['id']));
		$scheme = $_SERVER['REQUEST_SCHEME'];
		$host = $_SERVER['HTTP_HOST'];

		$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/read_single.php?id=';
		$search_url = $url.$id;
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "URL");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_URL, $search_url);
		$products = curl_exec($ch);
		curl_close($ch);
		 if (empty($products)){
	      print "Nothing returned from API.<br>";
	  	}
		else{
		     $decode = json_decode($products, true);
		     if($decode["status"] == 1){
		     	$result = $decode["data"];
			     	$name 			= $result['name'];
			     	$photo 			= $result['photo'];
			     	$stock_balance 	= $result['stock_balance'];
			     	$price 			= $result['price'];
			     	$description 	= $result['description'];
			     	$warehouse_name = $result['warehouse_name'];
			     	$warehouse_id	= $result['warehouse_id'];
		     }
		     else{
		     	echo $decode["data"];
		     }
		 }
	}



 ?>