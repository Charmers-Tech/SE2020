<?php 
	include_once "actions/function.php";

	include_once "actions/detail.php";
	 
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Detail</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
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
		
		.description{
			text-align:justify;
		}
 		
		.backBtn{
 			width: 80px;
 			background-color: #226089;
 			color: #ffffff;
 			border:none;
 			border-radius: 4px;
 			padding:5px;
  			
  		}
  		.backBtn:hover{
  			background-color:#2f89fc;
        	font-weight:bold;
  			}

		.image{
			width:150px;
			height:200px;
			margin-top:40px;
		}

 	</style>
</head>
<body>

	<div id="wrap">
	<!--heading-->
		<h1>View Detail</h1>
		<!--name balance price warehouse photo group-->
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1"></div>
				<div class="col-md-5">
					<div class="form-group">
						<label>Product Name:</label>
						<p class="form-control-static"><?php echo $name; ?></p>
					</div>
					<div class="form-group">
						<label>Stock Balance:</label>
						<p class="form-control-static"><?php echo $stock_balance; ?></p>
					</div>
					<div class="form-group">
						<label>Price:</label>
						<p class="form-control-static">$<?php echo $price; ?></p>
					</div>
					<div class="form-group">
						<label>Warehouse:</label>
						<p class="form-control-static"><?php echo $warehouse_name; ?></p>
					</div>
				</div>
				<div class="col-md-5">
					<img src="images/<?php echo $photo; ?>" alt="<?php echo $photo; ?>" class="image">
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<!--description and button group-->
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="form-group">
						<label>Description:</label>
						<p class="form-control-static description">
							<?php echo $description; ?>
						</p>
					</div>
					<a href="index.php" class="btn backBtn">Back</a>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</body>
</html>


