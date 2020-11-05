<!-- To give selected warehouse name in the warehouse select box of edit form UI -->
<?php 
	//to get scheme from server domain such as http or https
	$scheme = $_SERVER['REQUEST_SCHEME'];

	//to get hosting name from server domain such as localhost
	$host = $_SERVER['HTTP_HOST'];

	//generating API url to connect
	$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/warehouse/read.php';

	//using curl ->  command-line tool for sending HTTP requests from the terminal
	//Initializes a new curl session and setting up necessary for GET request
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url);
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
		for ($i=0; $i < count($result); $i++):
			$w_id 	= $result[$i]['id'];
			$name 	= $result[$i]['name'];
			if($w_id == $warehouse_id){
?>
				<option value="<?php echo $w_id ?>" selected><?php echo $name ?></option>
<?php
			}else{
?>
				<option value="<?php echo $w_id ?>"><?php echo $name ?></option>
<?php	
			}
		endfor;
?>
			</select>
<?php
		}
		else{
			echo $decode["message"];
			}
		}

?>