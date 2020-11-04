<?php 
	include_once "function.php";

	$scheme = $_SERVER['REQUEST_SCHEME'];
	$host = $_SERVER['HTTP_HOST'];

	if(isset($_POST['create'])){
		
		$name = clean_input($_POST['name']);

////// to check product name already exist ////
		$search_data = array("name" => $name);

		$search_url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/search.php';

		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "URL");
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($search_data));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
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
		     	$num_of_results = count($result);
		     	echo $num_of_results;
		    }
		}
////// End to check product name already exist ////
		
///// insert new product ////
		if ($num_of_results == 0) {

			$id = uniqid('id', true);
			$image_name = basename($_FILES['photo']['name']);
		    $image_temp = $_FILES['photo']['tmp_name'];
		    move_uploaded_file($image_temp, '../images/'.$image_name);

		    $description = clean_input($_POST['description']);
		    $stock_balance = clean_input($_POST['stockBal']);
		    $price = clean_input($_POST['price']);
		    $warehouse_id = clean_input($_POST['warehouse']);


		    $form_data = array(
				"id" 			=> $id,
				"warehouse_id" 	=> $warehouse_id,
				"name" 			=> $name,
				"photo" 		=> $image_name,
				"stock_balance" => $stock_balance,
				"price" 		=> $price,
				"description" 	=> $description
					
			);

			$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/create.php';
				
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "URL");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($form_data));
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
				$enc_res = encrypt_data($result);
				header("location:../index.php?return= $enc_res");
			}
		}
		else{
			header("location:../already_alert.php");
		}
//// End insert new product ////		
	}	

 ?>

 