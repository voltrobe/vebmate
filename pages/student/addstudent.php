<?php
session_start();
if(!isset($_SESSION['userid']))
header('Location: /../../index.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Image upload -->
  <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="../../assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../../assets/css/main.css" />
    <link rel="stylesheet" href="../../assets/css/theme.css" />
    <link rel="stylesheet" href="../../assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="../../assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
<link rel="stylesheet" href="../../assets/css/bootstrap-fileupload.min.css" />
<!-- Image upload end -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Black</b>Shadowz</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->

  <!--Sidebar-->
  <?php include '../include/sidebar.php';?>
  <!--Sidebar-->



    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student information.
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add new student</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add new student.</h3>
            </div>
            <!-- /.box-header --> 
            <div class="box-body">
              <div class="box box-info" >
            <div class="box-header with-border">
              <h3 class="box-title">Fields with * are mandatory.</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="addstud.php" enctype="multipart/form-data">
              <div class="box-body">
              <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name *</label>

                  <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-md-6">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Contact *
                </label>

                  <div class="col-md-6">
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact number" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Age 
					*</label>

                  <div class="col-md-2">
                    <input type="text" class="form-control" id="age" name="age" placeholder="Age" required>
                  </div>
                
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Date of Joining 
					*</label>

                  <div class="col-md-2">
                    <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Date of joining" required>
                  </div>
                </div></div>
				
				  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Total Fees*
                  </label>

                  <div class="col-md-2">
                    <input type="text" class="form-control" id="totalfees" name="totalfees" placeholder="Total fees" required>
                  </div>
                
				  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Fees Paid</label>

                  <div class="col-md-2">
                    <input type="text" class="form-control" id="feespaid" name="feespaid" placeholder="Fees paid">
                  </div>
                </div></div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Address 
					*</label>

                  <div class="col-md-6">
                    <textarea class="form-control" id="address" name="address" placeholder="Address" required></textarea>
                  </div>
                </div>
                
                <!-- Image Upload -->
				<div class="form-group">
                        <label class="control-label col-lg-4">Select student Image</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="../../assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">
									Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image" id="image" style="right: 0; top: 0" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">
									Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>

                              </div>
              <!-- /.box-body -->
              <center><div class="box-footer" style="width:50%">
              	<button type="submit" class="btn btn-info pull-right" style="width: 150px">Submit</button>
                <span><button type="reset" class="btn btn-default pull-left" style="width: 150px">Cancel</button></span>
                
              </div></center>
              <!-- /.box-footer -->
            </form>
          </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Developed by <a href="http://vebcrumbs.com" target="_blank"><b>Vebcrumbs.com</b></a>
    </div>
    <strong>Copyright &copy; 2016 <a href="#">B<span class="text-light-blue">lackShadowz</span></a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Image upload -->
    <script src="../../assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

         <!-- PAGE LEVEL SCRIPTS -->
    <script src="../../assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
         <!-- END PAGE LEVEL SCRIPTS -->

<!-- Image upload -->

<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>
  $(function () {

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

  });
</script>
</body>
</html>