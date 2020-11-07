<!-- To create new product, get data from Insert UI and send data to the API -->
<?php 
	//to get some functions
	include_once "function.php";

	//to get scheme from server domain such as http or https
	$scheme = $_SERVER['REQUEST_SCHEME'];

	//to get hosting name from server domain such as localhost
	$host = $_SERVER['HTTP_HOST'];

	// get a POST request from insert.php
	if(isset($_POST['create'])){
		
		$name = clean_input($_POST['name']);

////// to check product name already exist ////
		$search_data = array("name" => $name);

		//generating API url to connect with API search
		$search_url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/search.php';

		//using curl ->  command-line tool for sending HTTP requests from the terminal
		//Initializes a new curl session and setting up necessary for POST request
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "URL");
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($search_data));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
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
		     	$num_of_results = count($result);
		    }
		}
////// End to check product name already exist ////
		
///// insert new product ////
		if ($num_of_results == 0) {

			$image_name = basename($_FILES['photo']['name']);
		    $image_temp = $_FILES['photo']['tmp_name'];

		    $allowed =  array('jpeg','jpg', "png", "gif", "JPEG","JPG", "PNG", "GIF");
			$ext = pathinfo($image_name, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
				header("location:../insert.php?msg=1");
				die();
			}
		    move_uploaded_file($image_temp, '../images/'.$image_name);

		    $id = uniqid('id', true);
		    $description = clean_input($_POST['descriptions']);
		    $stock_balance = clean_input($_POST['stockBal']);
		    $price = clean_input($_POST['price']);
		    $warehouse_id = clean_input($_POST['warehouse']);

		    //receive the form data as an array
		    $form_data = array(
				"id" 			=> $id,
				"warehouse_id" 	=> $warehouse_id,
				"name" 			=> $name,
				"photo" 		=> $image_name,
				"stock_balance" => $stock_balance,
				"price" 		=> $price,
				"description" 	=> $description
					
			);

		    //generating API url to connect with API create
			$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/create.php';

			//using curl ->  command-line tool for sending HTTP requests from the terminal
			//Initializes a new curl session and setting up necessary for POST request
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "URL");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($form_data));
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// Execute cURL request and getting a response with JSON format
			$output = curl_exec($ch);
			curl_close($ch);
			if (empty($output)){
			    print "Nothing returned from API.<br>";
			}
			else{
				//decoding the JSON format to get the data as an array
				$decode = json_decode($output, true);
				$result = $decode["message"];
				$enc_res = encrypt_data($result);
				header("location:../index.php?return= $enc_res");
			}
		}
		else{
			header("location:../already_alert.php");
		}
//// End insert new product ////		
	}else{
		header('location:../index.php');
	}


 ?>

 