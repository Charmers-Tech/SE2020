<?php 

	$url = 'http://localhost/item-api/api/warehouse/read.php';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	$products = curl_exec($ch);
	curl_close($ch);
	 if (empty($products)){
      print "Nothing returned from API.<br>";
  	}
	else{
	     $decode = json_decode($products, true);
	     if($decode["status"] == 1){
	     	$result = $decode["data"];
	     	for ($i=0; $i < count($result); $i++) { 
		     	echo $result[$i]['id'];
		     	echo $result[$i]['name'];
		     	echo "<br>";
	     	}
	     }
	     else{
	     	echo $decode["message"];
	     }
	 }

 ?>