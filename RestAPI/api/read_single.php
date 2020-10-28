<?php 

	//include headers
	//it allow all origins like localhost, any domain or any subdomain
	header('Access-Control-Allow-Origin: *');
	//data which we are getting inside request
	header('Content-Type: application/json');
	//method type
	header('Access-Control-Allow-Methods: GET');
	
	//initializing our API
	include_once('../core/initialize.php');

	//instantiate product
	$product = new Product($db);

	if ($_SERVER['REQUEST_METHOD'] === "GET") {
		
		$product->id = isset($_GET['id']) ? $_GET['id'] : die();

		$product->get_single_data();

		$product_item = array(
			'id'   			=> $product->id,
			'name' 			=> $product->name,
			'photo'			=> $product->photo,
			'stock_balance' => $product->stock_balance,
			'price'  		=> $product->price,
			'description'   => $product->description,
			'warehouse_id' 	=> $product->warehouse_id,
			'warehouse_name'=> $product->warehouse_name 	
		);

		http_response_code(200); // OK status
		echo json_encode(array(
			"status"  => 1,
			"data" 	  => $product_item
		));

	}
	else{
		http_response_code(503); //service unavailable
		echo json_encode(array(
			"status"  => 0,
			"message" => "Access Denied"
		));
	}


 ?>