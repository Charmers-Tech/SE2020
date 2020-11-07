<!-- To update the product and send updated data to API -->
<?php
	session_start(); 
	//to get some functions
	include_once "function.php";

	//to get scheme from server domain such as http or https
	$scheme = $_SERVER['REQUEST_SCHEME'];

	//to get hosting name from server domain such as localhost
	$host = $_SERVER['HTTP_HOST'];

	// get data from the edit UI
	if(isset($_POST['update'])){

		$csrf = clean_input($_POST['csrf1']);
		if($_SESSION['csrf1'] === $csrf){
			
			$id = clean_input($_POST['id']);
			$enc_id = encrypt_data($id);
			$name = clean_input($_POST['name']); 

			$image_name = basename($_FILES['photo']['name']);
			$image_temp = $_FILES['photo']['tmp_name'];

			// checking update image file exist or not exist
			if (empty($image_name) || $image_name == '') {
				$image_name = clean_input($_POST['org_photo']);
			}

			$allowed =  array('jpeg','jpg', "png", "gif", "JPEG","JPG", "PNG", "GIF");
			$ext = pathinfo($image_name, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
				header("location:../edit.php?invalid_msg=$enc_id");
				die();
			}
			//sending image to the file system folder (images)
			move_uploaded_file($image_temp, '../images/'.$image_name);

			echo $description = clean_input($_POST['descriptions']);
			echo $stock_balance = clean_input($_POST['stockBal']);
			echo $price = clean_input($_POST['price']);
			echo $warehouse_id = clean_input($_POST['warehouse']);

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

			//generating API url to connect
			$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/update.php';

			//using curl ->  command-line tool for sending HTTP requests from the terminal
			//Initializes a new curl session and setting up necessary for PUT request
			$ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, "URL");
		    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
			curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($form_data));
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
			echo "CSRF Attack";
		}

	}else{
		header('location:../index.php');
	}
		

 ?>

 