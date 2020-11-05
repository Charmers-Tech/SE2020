<!-- If the product name exists in the table, inserting operation does not work. So to show user with alert -->
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
                            <h1>Product Name Already Exist</h1>
                        </div>
                        <form action="actions/delete.php" method="post">
                            <div class="alert alert-warning fade in">
                                <p class="delete">You cannot add the product. Your product name already exist in the table.</p><br>
                                <p>
                                    <a href="index.php" class="btn btn-info">OK</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>        
            </div>
        </div>

    </body>
    </html>