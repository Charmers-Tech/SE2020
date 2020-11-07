<?php 
///to get some functions ///
	include_once "actions/function.php";

	$invalid_file ="";
	if (isset($_GET['invalid_msg'])) {
		$invalid_file = "Image must be *.jpg, *.png, *.jpeg, *.gif,";

	//getting encrypt ID from get request and decrypt the ID
		$id = decrypt_data(clean_input($_GET['invalid_msg']));

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
			   
	}else{

		///to get product detail data by ID ///
		include_once "actions/detail.php";
	}
	
	 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	
	<style type="text/css">

		body {
 			background: #efefef;
 			font-family: arial;
 			color: #226089;
 			}

 		#wrap{
 			width: 500px;
 			padding: 20px;
 			margin: 10px auto;
 			border: 4px solid #ddd;
 			background: #fff;
 			}

 		h1 {
 			margin: 0 0 30px 0;
 			padding: 0 0 10px 0;
 			border-bottom: 1px solid #ddd;
 			}
			 
 		.form{
 			padding-left: 45px;
 			padding-right: 45px;
 			
 		}	

		table{
			padding: 10px;
			margin: 5px;

		}

		th{
			padding-left: 10px;
			padding-bottom: 20px;
			width:150px;
			}

 		input{
			display: block;
			margin-bottom: 20px;
			height: 25px;
			width:100%;
		}
		
		textarea{
			width:100%;
			margin-bottom: 20px;
		}

		select{
			height: 25px;
			width:104%;
			margin-bottom: 20px;
		}
 		
 		tr{
 			text-align: left;
 		}
 		
 		button{
 			width: 80px;
			height:30px;
 			background-color: #226089;
 			color: #ffffff;
 			border:none;
 			border-radius: 4px;
 			padding:5px;
  			
  		}
  		
  		button:hover{
  			background-color:#2f89fc;
        	font-weight:bold;
  			}
  		a{
  			text-decoration: none;
  			color: #ffffff;
  			display: block;
  			text-align: center;

  		}
  		.invalid{
  			font-size: 12px;
  			color: red;
  		}


 	</style>
</head>
<body>
    
<div id="wrap">
		<form method="post" action="actions/update.php" enctype="multipart/form-data">
			<h1>Edit Product</h1>
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<div class ="form">
				<table>
					<tr>
						<th>Product Name</th>
						<td ><input type="text" name="name" id="name" class="form-control" required value="<?php echo $name ?>"></td>
					</tr>
					<tr>
                        <th><label class="control-label" for="photo">Product Photo</label></th>
						<td>
						<img class="img-responsive" width="80px" src="images/<?php echo $photo ?>"><br>
						 <span class="invalid"><?php echo $invalid_file; ?></span>
                        <input type="file" name="photo" accept="image/x-png,image/jpeg" id="photo">
                        <input type="hidden" name="org_photo" value="<?php echo $photo ?>">
						</td>
					</tr>
					<tr>
						<th >Descriptions</th>
						<td ><textarea class="form-control" name="descriptions" id="descriptions" cols="30" rows="6" required><?php echo $description ?>
						</textarea></td>
					</tr>
					<tr>
						<th >Stock Balance</th>
						<td ><input type="number" name="stockBal" min="0" max="99999" class="form-control" required value="<?php echo $stock_balance ?>"></td>
					</tr>
					<tr>
						<th >Price</th>
						<td ><input type="number" step="any" name="price" min="1" class="form-control" required value="<?php echo $price ?>"></td>
					</tr>
					<tr>
						<th >Warehouse</th>
						<td ><select class="form-control" name="warehouse" required >
							<option value="">Choose...</option>
							<!-- getting warehouse data from api and show in select box -->
							<?php include_once "actions/wh_selected.php" ?>
						</td>
					</tr>
					<tr>
						<th></th>
						<td>
							<button type="submit" class="button" name="update">
								Save
							</button>
							<button type="button" onclick="window.location = '/SE2020/App/index.php';">
								Cancel
							</button>
						</td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</body>
</html>
        