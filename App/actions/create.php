<?php 
	include_once "function.php";

	if(isset($_POST['create'])){
		$id = uniqid('id', true);
		$name = clean_input($_POST['name']);

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
			"photo" 		=>$image_name,
			"stock_balance" => $stock_balance,
			"price" 		=> $price,
			"description" 	=> $description
			
		);

		$scheme = $_SERVER['REQUEST_SCHEME'];
		$host = $_SERVER['HTTP_HOST'];
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
			    echo "$result<br>";
			 header("location:../index.php");
		}

	}
	header("location:../index.php");

 ?>

 