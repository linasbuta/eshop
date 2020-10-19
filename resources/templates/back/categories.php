    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin - Bootstrap Admin Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../../public/admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../../public/admin/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../../../public/admin/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../../public/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

       

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">SB Admin</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php $_SESSION['username'] ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        
                            <li class="divider"></li>
                            <li>
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="">
                            <a href="index.php?orders"><i class="fa fa-fw fa-dashboard"></i> Orders</a>
                        </li>
                        <li>
                            <a href="index.php?products"><i class="fa fa-fw fa-bar-chart-o"></i> View Products</a>
                        </li>
                        <li>
                            <a href="index.php?add_product"><i class="fa fa-fw fa-table"></i> Add Product</a>
                        </li>

                        <li>
                            <a href="index.php?categories"><i class="fa fa-fw fa-desktop"></i> Categories</a>
                        </li>
                        <li>
                            <a href="index.php?reports"><i class="fa fa-fw fa-wrench"></i>Reports</a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>



            <div id="page-wrapper">

                <div class="container-fluid">          

                    <h1 class="page-header">
                    Product Categories

                    </h1>


                <div class="col-md-4">
                    
                    <form action="" method="post">
                    
                        <div class="form-group">
                            <label for="category-title">Title</label>
                            <input type="text" class="form-control" name="titel">
                        </div>

                        <div class="form-group">
                            
                            <input type="submit" class="btn btn-primary" value="Add Category" name="add_category">
                        </div>      
                        <?php 
                        if(isset($_POST['add_category'])){
                            $title = $_POST['titel'];
                            categories_insert($title);

                        }
                        ?>

                    </form>


                </div>


                <div class="col-md-8">

                    <table class="table">
                            <thead>

                        <tr>
                            <th>id</th>
                            <th>Title</th>
                        </tr>
                            </thead>


                    <tbody>
                    <?php categories();?>
                    </tbody>

                        </table>

                </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../../../public/admin/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../../public/admin/js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../../../public/admin/js/plugins/morris/raphael.min.js"></script>
        <script src="../../../public/admin/js/plugins/morris/morris.min.js"></script>
        <script src="../../../public/admin/js/plugins/morris/morris-data.js"></script>

    </body>

    </html>
