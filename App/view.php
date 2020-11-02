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
						<p class="form-control-static">Iphone</p>
					</div>
					<div class="form-group">
						<label>Stock Balance:</label>
						<p class="form-control-static">4</p>
					</div>
					<div class="form-group">
						<label>Price:</label>
						<p class="form-control-static">$234</p>
					</div>
					<div class="form-group">
						<label>Warehouse:</label>
						<p class="form-control-static">1</p>
					</div>
				</div>
				<div class="col-md-5">
					<img src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYjc?ver=a28c" alt="iphone" class="image">
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
						<p class="form-control-static description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere nam unde ipsam. Quisquam dolorum sapiente iusto provident illo possimus architecto omnis hic similique quas tenetur, aperiam amet, vel excepturi perferendis!</p>
					</div>
					<a href="index.php" class="btn backBtn">Back</a>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</body>
</html>


