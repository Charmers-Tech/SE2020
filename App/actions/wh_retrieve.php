<?php 

		$scheme = $_SERVER['REQUEST_SCHEME'];
		$host = $_SERVER['HTTP_HOST'];
		$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/warehouse/read.php';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		$products = curl_exec($ch);
		curl_close($ch);
		if (empty($products)){
			print "Nothing returned from API.<br>";
		}
		else{
			$decode = json_decode($products, true);
			if($decode["status"] == 1){
				$result = $decode["data"];
			for ($i=0; $i < count($result); $i++):
				$id 	= $result[$i]['id'];
				$name 	= $result[$i]['name'];
?>
		<option value="<?php echo $id ?>"><?php echo $name ?></option>
<?php	
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