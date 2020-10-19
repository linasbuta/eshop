
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
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