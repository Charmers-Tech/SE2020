<?php 
	
	$scheme = $_SERVER['REQUEST_SCHEME'];
	$host = $_SERVER['HTTP_HOST'];

	$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/read.php';
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	$products = curl_exec($ch);
	curl_close($ch);
	 if (empty($products)){
      print "Nothing returned from API.<br>";
  	}
	else{

		$result_per_page = 10;
		$show_count_num = 0;
		$prev = 1;
		$next = $prev + 1;
		
		if(isset($_GET['page'])){
			$page_no = intval($_GET['page']);
			$result_per_page *= $page_no;
			$show_count_num = $result_per_page - 10;

			$prev = $page_no - 1;

			$next = $page_no + 1;

		}

	    $decode = json_decode($products, true);
	    if($decode["status"] == 1){
	     	$result = $decode["data"];
	     	$num_of_results = count($result);
	     	$number_of_page = ceil($num_of_results / 10);

	     	if ($next > $number_of_page) {
	     		$next = 1;
	     	}
	     	if ($prev < 1) {
				$prev = $number_of_page;
			}

	     	if($result_per_page >= $num_of_results){
				$differ = $result_per_page - $num_of_results;
				$result_per_page = $result_per_page - $differ;
			}

	     	for ($i=$show_count_num; $i < $result_per_page; $i++):
		     	$id 			= $i+1;
		     	$name 			= $result[$i]['name'];
		     	$photo 			= $result[$i]['photo'];
		     	$stock_balance	= $result[$i]['stock_balance'];
		     	$price 			= $result[$i]['price'];
		     	$description 	= $result[$i]['description'];
		     	$w_name 		= $result[$i]['warehouse_name'];

 ?>
	 <tr>
	    <td><?php echo "$id"; ?></td>
	    <td><?php echo "$name"; ?></td>
	    <td>
	    	<img src="images/<?php echo "$photo"; ?>" alt="<?php echo "$photo"; ?>" style="width:40px;height:40px;"> 
	   	</td>
	    <td><?php echo "$stock_balance"; ?></td>
	    <td><?php echo "\$".$price; ?></td>
	    <td><?php echo "$description"; ?></td>
	    <td>
	        <a href="view.php"><span class='glyphicon glyphicon-eye-open mr-4' ></span></a>

	        <a href="update.php"><span class='glyphicon glyphicon-pencil mr-4'></span></a>

	        <a href="delete.php"><span class='glyphicon glyphicon-trash'></span></a>
	    </td>
	</tr>
<?php endfor; 
		}
	     else{
	     	echo $decode["message"];
	     }
	 }

?>