<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

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
			padding-top: 10px;
			padding-bottom: 10px;
			}

 		input[type=text] {
				 display: block;
 				margin-bottom: 10px;
 				height: 25px;
 				}
 		
 		tr{
 			text-align: left;
 		}
 		
 		button{
 			width: 80px;
 			background-color: #226089;
 			color: #ffffff;
 			border:none;
 			border-radius: 4px;
 			padding:5px;
  			
  		}
  		.button:hover{
  			background-color:#2f89fc;
        	font-weight:bold;
  			}


 	</style>
</head>
<body>

	<div id="wrap">
		<form >
			<h1>Add Product</h1>
			<div class ="form">
				<table>
					<tr>
						<th width="150px" >Product Name</th>
						<th ><input type="text" name="name" class="form-control" required></th>
					</tr>
					<tr>
						<th>Product Photo</th>
						<th>
							<input type="file" name="photo" accept="image/x-png,image/jpeg" class=" file-upload form-control-file " required>
						</th>
					</tr>
					<tr>
						<th >Descriptions</th>
						<th ><textarea class="form-control" rows="3" id="descriptions" required></textarea></th>
					</tr>
					<tr>
						<th >Stock Balance</th>
						<th ><input type="number" name="stockBal" min="0" max="99999" class="form-control" required></th>
					</tr>
					<tr>
						<th >Price</th>
						<th ><input type="number" name="price" min="1" class="form-control" required></th>
					</tr>
					<tr>
						<th >Warehouse</th>
						<th ><select class="form-control" name="warehouse" required >
							<option value="">Choose...</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							</select>
						</th>
					</tr>
					<tr>
						<th></th>
						<th>
							<button type="submit" class="button">Submit</button>
							<button type="cancel" class="button">Cancel</button>
						</th>
					</tr>
				</table>
			</div>
		</form>
	</div>
</body>
</html>


