<?php 
	session_start();

	include_once "actions/function.php";

	$invalid_file ="";
	if (isset($_GET['msg'])) {
		$invalid_file = "Image must be *.jpg, *.png, *.jpeg, *.gif,";;
		   
	}
	$token = md5(uniqid(rand(), true));
    $_SESSION['csrf'] = $token;	

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	
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
  		.backBtn{
 			width: 80px;
			height:30px;
 			background-color: #226089;
 			color: #ffffff;
 			border:none;
 			border-radius: 4px;
 			padding:5px;
  			
  		}
  		.backBtn:hover{
  			background-color:#2f89fc;
        	font-weight:bold;
        	color: white;
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
		<form method="post" action="actions/create.php" enctype="multipart/form-data">
			<h1>Add Product</h1>
			<input type="hidden" name="csrf" value="<?php echo $token; ?>">
			<div class ="form">
				<table>
					<tr>
						<th>Product Name</th>
						<td ><input type="text" name="name" id="name" class="form-control" required></td>
					</tr>
					<tr>
                        <th><label class="control-label" for="photo">Product Photo</label></th>
						<td>
						<span class="invalid"><?php echo $invalid_file; ?></span>
                        <input type="file" name="photo" accept="image/x-png,image/jpeg" id="photo" required>
                       
						</td>
					</tr>
					<tr>
						<th >Descriptions</th>
						<td ><textarea class="form-control" name="descriptions" id="descriptions" cols="30" rows="6" required></textarea></td>
					</tr>
					<tr>
						<th >Stock Balance</th>
						<td ><input type="number" name="stockBal" min="0" max="99999" class="form-control" required></td>
					</tr>
					<tr>
						<th >Price</th>
						<td ><input type="number" step="any" name="price" min="1" class="form-control" required></td>
					</tr>
					<tr>
						<th >Warehouse</th>
						<td ><select class="form-control" name="warehouse" required >
							<option value="">Choose...</option>
							<?php include_once "actions/wh_retrieve.php" ?>
						</td>
					</tr>
					<tr>
						<th></th>
						<td>
							<button type="submit" class="button" name="create">
								Submit
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
        