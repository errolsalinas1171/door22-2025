<?php include('dbconnect.php'); ?>
<?php include('block_admin.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Door22 - Payment Kiosk Aministration</title>

<!-- POPUP -->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="js/jquery.js" type="text/javascript"></script> 
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
<!-- CLOSE -->

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin_index.php">Door22</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        </li>
                        <li><a href="admin_settings.php"><i class="fa fa-gear fa-fw"></i> Admin Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="admin_logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <div id="othersections"> 
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="admin_index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-edit"></i></i> Clients<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin_user_add.php">Add Client</a>
                            </li>
                            <li class="active-menu">
                                 <a href="admin_user_display.php">View Clients</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i></i> Products/WiFi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin_products_add.php">Add Products</a>
                            </li>
                            <li>
                                <a href="admin_products.php">View All Products</a>
                            </li>
                            <li>
                                <a href="admin_wifi_add.php">Add WiFi Vouchers</a>
                            </li>
                            <li>
                                <a href="admin_wifi.php">View WiFi Vouchers</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i></i> Reports<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin_display_reports_all.php">All Reports</a>
                            </li>
                            <li>
                                <a rel='facebox' href=popup_daily_select.php>Daily Reports</a>
                            </li>
                            <li>
                                <a rel='facebox' href=popup_monthly_select.php>Monthly Reports</a>
                            </li>
                            <li>
                                <a href="admin_reports_client.php">Client's Reports</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i></i> Rooms<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin_room_add.php">Add Room</a>
                            </li>
                            <li>
                                <a href="admin_room.php">View Rooms</a>
                            </li>
                            <li>
                                <a href="admin_room_history.php">View Room History</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gear"></i></i> Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="admin_settings_header.php">Header Settings</a> </li>
                            <li><a href="admin_settings_receipt_header.php">Receipt Header Settings</a></li>
                            <li><a href="admin_settings_receipt_footer.php">Receipt Footer Settings</a></li>
                        </ul>
                    </li>
                </ul>

            </div>

        </nav>
        </div>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

                <div id="othersections"> 
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            List of all Clients 
                        </h1>
                    </div>
                </div>
                </div>
                <!-- /. ROW  -->



                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                List of all Clients
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php include('displayusers.php'); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->

<script>
        $('#edit-modal').on('show.bs.modal', function(e) {
            
            var $modal = $(this),
                esseyId = e.relatedTarget.id;
            
//            $.ajax({
//                cache: false,
//                type: 'POST',
//                url: 'backend.php',
//                data: 'EID='+essay_id,
//                success: function(data) 
//                {
                    $modal.find('.edit-content').html(esseyId);
//                }
//            });
            
        })
</script>


    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>