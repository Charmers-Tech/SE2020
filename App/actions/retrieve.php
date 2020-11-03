

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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product Item Module</title>
    <style>
        .wrapper{
            width: 500px;
            margin:30px 550px;
        }

        *{
            font-family:arial;
        }

        .delete{
            color:red;
            font-weight:bold;
        }
    </style>

</head>
<body>
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

            <a href="#" onclick="document.getElementById('delete').style.display='block'"><span class='glyphicon glyphicon-trash'></span></a>

			<!--delete alert box-->
            <div id="delete" class="modal">
				<div class="wrapper">
					<form action="#" method="post">
						<div class="alert alert-info fade in">
							<input type="hidden" name="id" value="1"/>
							<p class="delete">Are you sure you want to delete this record?</p><br>
							<p>
								<input type="submit" value="Yes" class="btn btn-danger">
								<a href="index.php" class="btn btn-default">No</a>
							</p>
						</div>
					</form>	        	
				</div>
            </div>
			<!--end of delete alert box section-->

	    </td>
	</tr>

    <script>
		// Get the modal
		var modal = document.getElementById('delete');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
		}
		}
	</script>

</body>
</html>

<?php endfor; 
		}
	     else{
	     	echo $decode["message"];
	     }
	 }

?>









