<?php 
	include_once "function.php";

	$scheme = $_SERVER['REQUEST_SCHEME'];
	$host = $_SERVER['HTTP_HOST'];

	if(isset($_POST['update'])){

		$id = clean_input($_POST['id']);
		$name = clean_input($_POST['name']); 

		$image_name = basename($_FILES['photo']['name']);
		$image_temp = $_FILES['photo']['tmp_name'];
		if (empty($image_name) || $image_name == '') {
			$image_name = clean_input($_POST['org_photo']);
		}
		move_uploaded_file($image_temp, '../images/'.$image_name);

		echo $description = clean_input($_POST['descriptions']);
		echo $stock_balance = clean_input($_POST['stockBal']);
		echo $price = clean_input($_POST['price']);
		echo $warehouse_id = clean_input($_POST['warehouse']);
	
		$form_data = array(
			"id" 			=> $id,
			"warehouse_id" 	=> $warehouse_id,
			"name" 			=> $name,
			"photo" 		=> $image_name,
			"stock_balance" => $stock_balance,
			"price" 		=> $price,
			"description" 	=> $description
			
		);

		$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/update.php';
		
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "URL");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($form_data));
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
	}else{
		header('location:../index.php');
	}
		

 ?>

 