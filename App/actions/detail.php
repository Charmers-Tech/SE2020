<!-- To retrieve product detail information in the UI -->
<?php 

if (isset($_GET['id'])) {

	//getting encrypt ID from get request and decrypt the ID
	$id = decrypt_data(clean_input($_GET['id']));

	//to get scheme from server domain such as http or https
	$scheme = $_SERVER['REQUEST_SCHEME'];

	//to get hosting name from server domain such as localhost
	$host = $_SERVER['HTTP_HOST'];

	//generating API url to connect
	$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/read_single.php?id=';
	$search_url = $url.$id;

	//using curl ->  command-line tool for sending HTTP requests from the terminal
	//Initializes a new curl session and setting up necessary for GET request
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "URL");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_URL, $search_url);

	// Execute cURL request and getting a response with JSON format
	$products = curl_exec($ch);
	curl_close($ch);
	if (empty($products)){
	    print "Nothing returned from API.<br>";
	}
	else{
		//decoding the JSON format to get the data as an array
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