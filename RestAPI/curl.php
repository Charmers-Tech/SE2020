<?php 

	$url = 'http://localhost/ItemModule/RestAPI/api/read.php';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	$products = curl_exec($ch);
	curl_close($ch);
	 if (empty($products)){
      print "Nothing returned from url.<p>";
  	}
	else{
	     $decode = json_decode($products, true);
	     if($decode["status"] == 1){
	     	$result = $decode["data"];
	     	for ($i=0; $i < count($result); $i++) { 
		     	echo $result[$i]['id'];
		     	echo $result[$i]['name'];
		     	echo $result[$i]['photo'];
		     	echo $result[$i]['stock_balance'];
		     	echo $result[$i]['price'];
		     	echo $result[$i]['description'];
		     	echo $result[$i]['warehouse_name'];
		     	echo "<br>";
	     	}
	     }
	     else{
	     	echo $decode["message"];
	     }
	 }

 ?>