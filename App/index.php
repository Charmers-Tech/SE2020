<?php include_once "actions/function.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <title>Product Item Module</title>
    <style>

        *{
            box-sizing:border-box;
            padding:0;
            margin:0;
            font-family: arial;
        }
        .page-header h2{
            margin-top: 0;
            color:#226089;
        }

        form.search input[type=text] {
        padding: 10px;
        border: 1px solid grey;
        float: left;
        width:150px;
        height:30px;
        background: #f1f1f1;
        }

        form.search button {
        float: left;
        height:30px;
        width:37px;
        padding: 3px;
        background: #226089;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
        }

        form.search button:hover {
        background: #2f89fc;
        
        }

        .add{
            width:130px;
            height:40px;
            background-color:#226089;
            color:#ffffff;
            font-weight:bolder;
        }

        .add:hover {
        background-color:#2f89fc;
        font-weight:bold;
        }

        span{
            color:#226089;
            font-size:1.2em;
        }

        .table{
            color:#226089;
            width:100%;
            padding-top:10px;
        } 

        .pagination {
        display: inline-block;
        float:right;
        }

        .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        margin: 0 4px;
        }

        .pagination a:hover {
        background-color: #226089;
        color: white;
        border: 1px solid #4CAF50;
        text-decoration: none;
        }
    </style>
</head>
<body>
    <section class="container">
        <!--header section-->
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Product Item Module</h2>
                </div>
            </div>
        </div>
        
        <!--search box and add new item button-->
        <div class="row">
            <div class="col-md-5">
                <div class="input-group">
                    <form class="search" method="post" action="index.php">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" id="submit" class="btn" name="submit"><i class="fa fa-search"></i></button> 
                        </span>                      
                    </form>
                </div> 
            </div>
            <div class="col-md-7">
                <a href="#" class="btn add pull-right ">Add New Item</a>
            </div>
        </div>
        
        <!--crud table section-->
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <table id="table" class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Photo</th>
                            <th>Balance</th>
                            <th>Price</th>
                            <th>Descriptions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            $flag = false;
                            if (isset($_POST['submit'])) {
                                $flag = true;
                            }
                            if ($flag) {
                                include_once "actions/search.php" ;
                            }
                            else {
                                include_once "actions/retrieve.php" ;
                            }
                        ?>
        
    </section>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>
