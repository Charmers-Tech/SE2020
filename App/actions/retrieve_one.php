<?php 
	
	$url = 'http://localhost/item-api/api/item/read_single.php?id=';
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
		     	echo $result['name'];
		     	echo $result['photo'];
		     	echo $result['stock_balance'];
		     	echo $result['price'];
		     	echo $result['description'];
		     	echo $result['warehouse_name'];
		     	echo "<br>";
	     }
	     else{
	     	echo $decode["message"];
	     }
	 }

 ?>