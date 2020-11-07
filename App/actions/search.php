<!-- To give product information that is search by user in index page -->
<?php 
	//to get scheme from server domain such as http or https
	$scheme = $_SERVER['REQUEST_SCHEME'];

	//to get hosting name from server domain such as localhost
	$host = $_SERVER['HTTP_HOST'];

	//get product name from search box
	$name = clean_input($_POST['search']);
	//to get begin with name and receive the product name as an array
	$form_data = array("name" => $name.'%');

	//generating API url to connect
	$url = $scheme.'://'.$host.'/SE2020/RestAPI/api/item/search.php';

	//using curl ->  command-line tool for sending HTTP requests from the terminal
	//Initializes a new curl session and setting up necessary for POST request
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "URL");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($form_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
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
	     	$num_of_results = count($result);

	     	for ($i=0; $i < $num_of_results ; $i++):
		     	$id 			= $i+1;
		     	$name 			= $result[$i]['name'];
		     	$photo 			= $result[$i]['photo'];
		     	$stock_balance	= $result[$i]['stock_balance'];
		     	$price 			= $result[$i]['price'];
		     	$description 	= $result[$i]['description'];
		     	$w_name 		= $result[$i]['warehouse_name'];
		     	$p_id 			= $result[$i]['id'];
?>
<!-- to show product information as table format in index page -->
	<tr>
	    <td><?php echo "$id"; ?></td>
	    <td><?php echo "$name"; ?></td>
	    <td>
	    	<img src="images/<?php echo "$photo"; ?>" alt="<?php echo "$photo"; ?>" style="width:40px;height:40px;"> 
	   	</td>
	    <td><?php echo "$stock_balance"; ?></td>
	    <td><?php echo "\$".$price; ?></td>
	    <td>
	    	<?php echo substr($description, 0 ,50); ?>
			<?php echo strlen($description) > 50 ? '...' : '' ?>	
	    </td>
	    <td>
	        <a href="view.php?id=<?php echo encrypt_data($p_id) ?>"><span class='glyphicon glyphicon-eye-open mr-4' ></span></a>

	        <a href="edit.php?id=<?php echo encrypt_data($p_id) ?>"><span class='glyphicon glyphicon-pencil mr-4'></span></a>

	        <a href="delete.php?id=<?php echo encrypt_data($p_id) ?>&name=<?php echo "$name"; ?>"><span class='glyphicon glyphicon-trash'></span></a>
	    </td>
	</tr>
<?php endfor; 
		}
	     else{
?>
<!-- to show alert, when getting some error msg from API -->
	<div class="alert alert-danger" role="alert">
        <strong><?php echo $decode["data"]; ?></strong>
        <button type="button" class="close" aria-label="Close">
	        <span aria-hidden="true">
	            <a href="index.php" class="alert_close">&times;</a>
	        </span>
        </button>
    </div>
	     	
<?php
	     }
	 }

?>
</tbody>
    </table>
        </div>
	        </div>

	        <!--pagination section-->
	        <div class="row">
	            <div class="col-md-12">
	                <div class="pagination">	                   
	                    <a href="index.php">&laquo; back</a>
	                </div>
	            </div>
	        </div>
