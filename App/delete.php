<?php 
    include_once "actions/function.php";

    if(isset($_GET['id'])){
        $enc_id = clean_input($_GET['id']);
        $id = decrypt_data($enc_id);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete Item</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            .wrapper{
                width: 500px;
                margin: 0 auto;
            }

            *{
                font-family:arial;
            }

            .page-header{
                color:#226089;
            }

            .delete{
                color:#226089;
                font-weight:bold;
            }
            
            
        </style>
    </head>
    <body>
                 
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>Delete Record</h1>
                        </div>
                        <form action="actions/delete.php" method="post">
                            <div class="alert alert-danger fade in">
                                <input type="hidden" name="id" value="<?php echo $id ?>"/>
                                <p class="delete">Are you sure you want to delete this record?</p><br>
                                <p>
                                    <input type="submit" value="Yes" name="yes" class="btn btn-danger">
                                    <a href="index.php" class="btn btn-default">No</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>        
            </div>
        </div>

    </body>
    </html>
<?php } ?>