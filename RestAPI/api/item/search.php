<?php 

	//include headers
	//it allow all origins like localhost, any domain or any subdomain
	header('Access-Control-Allow-Origin: *');
	//data which we are getting inside request
	header('Content-Type: application/json');
	//method type
	header('Access-Control-Allow-Methods: POST');
	//it allow header
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
	
	//initializing our API
	//include_once('../../core/initialize.php');
	
	include_once('../../includes/config.php');
	
	include_once('../../core/product.php');

	//instantiate product
	$product = new Product($db);

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		
		//get raw data from request body
		$data = json_decode(file_get_contents("php://input"));

		if(	!empty($data->name))
		{
			$product->name = $data->name;

			$result = $product->search_data();

			$num = $result->rowCount();

			if($num > 0){
				$product_arr = array();
				$product_arr['data'] = array();
				
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					extract($row);
					$product_item = array(
						'id'   			=> $id,
						'name' 			=> $name,
						'photo'			=> $photo,
						'stock_balance' => $stock_balance,
						'price'  		=> $price,
						'description'   => html_entity_decode($description),
						'warehouse_id' 	=> $warehouse_id,
						'warehouse_name'=> $warehouse_name 	
					);

					array_push($product_arr['data'], $product_item);
				}
				http_response_code(200); // OK status
				echo json_encode(array(
					"status"  => 1,
					"data" 	  => $product_arr['data'] 
				));

			}
			else{
				http_response_code(404); // Page Not Found
				echo json_encode(array(
					"status"  => 0,
					"data" 	  => "Product Not Found"
				));
			}
		}
		else{
				http_response_code(404); // Page Not Found
				echo json_encode(array(
					"status"  => 0,
					"data" 	  => "Type product name in Search"
				));
			}
	}
	else{
		http_response_code(503); //service unavailable
		echo json_encode(array(
			"status"  => 0,
			"data" => "Access Denied"
		));
	}


 ?>