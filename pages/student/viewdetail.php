<?php
require_once('../include/connect.php');
if(!isset($_SESSION['userid']))
header('Location: ../../index.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ViewDetails | BlackkShadowzzz</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
       <link rel="stylesheet" href="../../assets/plugins/Font-Awesome/css/font-awesome.css" />

  <link rel="stylesheet" href="../../plugins/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../plugins/ionicons.min.css">
      <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- Popup window -->
 <!--<link type="text/css" rel="stylesheet" href="../popup/popModal.css">-->
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
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <!--Sidebar-->
  <?php include '../include/sidebar.php';?>
  <!--Sidebar-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student information.
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Student details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-7">
         <!-- /.box -->

          <div class="box box-solid">
		
				<div class="box-header with-border">
				<i class="fa fa-text-width"></i>
				<h3 class="box-title">Details of the student.</h3>
				</div>
            <!-- /.box-header --> 
            <div id='tabledata' class="box-body">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                
<?php
      $id=$_GET['id'] ;
	  
//include 'connect.php';
$q=mysql_query("select * from student_info where id=$id");
$num=mysql_num_rows($q);

if(isset($_GET['updatefields']))
{
	//$id=$_GET['userid'];
	$_GET['name'] =trim($_GET['name']," ");
	$_GET['email'] = trim($_GET['email']," ");
	$_GET['contact'] = trim($_GET['contact']," ");
	$_GET['doj'] = trim($_GET['doj']," ");
	$_GET['fees']= trim($_GET['fees']," ");
	$_GET['batch'] = trim($_GET['batch']," ");
	$_GET['address'] = trim($_GET['address']," ");
	$_GET['gender'] = trim($_GET['gender']," ");
	$_GET['occupation'] = trim($_GET['occupation']," ");
	
	mysql_query("update student_info set name='".$_GET['name']."',email='".$_GET['email']."',contact='".$_GET['contact']."',doj='".$_GET['doj']."',totalfees=".$_GET['fees'].",address='".$_GET['address']."',batch='".$_GET['batch']."',occupation='".$_GET['occupation']."',gender='".$_GET['gender']."'   where id=$id");
}

if($num > 0)
{
	$i=1;
	while($row=mysql_fetch_array($q))
	{
		$name=$row['name'];
		$id=$row['id'];
		
    	$doj=$row['doj'];
		$contact=$row['contact'];
		$batchy=$row['batch'];
        $email=$row['email'];
        $age=$row['age']; 
        $address=$row['address'];
        $gender=$row['gender'];
        $occupation=$row['occupation'];
        
		$feespaid=$row['feespaid'];
		$totalfees=$row['totalfees'];
		$myfile=$row['myfile'];
		
		$dues=$row['totalfees']-$row['feespaid'];
		?>

                 <td>
				  <tr> 
                  <th>Student Name</th>
				  <td><input type="hidden" class="txtableid"  value="<?php echo $id;?>">
             	  <input type="text" style='display:none;' class="txtablename"  value="<?php echo $name;?>" >
				  <span id='areaname'><?php echo $name;?></span>
				  </td>
             	 </tr>
             	 <tr> 
                  <th>Gender</th>
                  <td><input type="text" style='display:none;' class="txtablegender"  value="<?php echo $gender;?>" >
				  <span id='areagender'><?php echo $gender;?></span>
				  </td>
                  </tr>
                  <tr> 
                  <th>Occupation</th>
                  <td><input type="text" style='display:none;' class="txtableoccu"  value="<?php echo $occupation;?>" >
				  <span id='areaoccu'><?php echo $occupation;?></span>
				  </td>
                  </tr>
             	  <tr> 
                  <th>Email</th>
                  <td><input type="text" style='display:none;' class="txtableemail"  value="<?php echo $email;?>" >
				  <span id='areaemail'><?php echo $email;?></span>
				  </td>
                  </tr>
                 <tr> 
                  <th>Date of joining</th>
                  <td><input type="text" style='display:none;' class="txtabledoj form-control" id="datepicker" name="datepicker" placeholder="Date of joining" value="<?php echo $doj;?>" >
				  <span id='areadoj'><?php echo $doj;?></span>
				  </td>
                  </tr>
                  <tr>
                  <th>Contact info</th>
                  <td><input type="text" style='display:none;' class="txtablecontact"  value="<?php echo $contact;?>" >
				  <span id='areacontact'><?php echo $contact;?></span>
				  </td>
                  </tr>
                  <tr>
                  <th>Total Fees</th>
                  <td><input type="text" style='display:none;' class="txtablefees"  value="<?php echo $totalfees;?>" >
				  <span id='areafees'><?php echo $totalfees;?></span>
				  </td>
                  </tr>
                  <tr>
                  <th>Fees paid</th>
                  <td><span class='col-sm-2' id='feespaid'><?php echo $feespaid;?></span>
				  <span class='col-sm-8'>
					<div class="input-group margin">
						<div class="input-group-btn">
					<button id='feesedit' type="button" onclick="feespaid(<?php echo $id;?>,<?php echo $feespaid;?>)"  class="btn btn-success">Pay</button>
						</div>
						<!-- /btn-group -->
					<input id='feesinput' placeholder='Enter Paid Amount' class="form-control" type="text"/>
					</div>
				  
				  </td>
                  </tr>
                  <tr>
                  <th>Dues</th>
                  <td><span id='feesdues'><?php echo $dues;?></span>
				  </td>
                  </tr>
                  <tr>
                  <th>Batch</th>
                  <td>
                  <select  style='display:none;' class="batch"  value="<?php echo $batch;?>" >
                  <option value="monday">Monday</option>
                  <option value="tuesday">Tuesday</option>
                  <option value="regular">Regular</option>
                  <option value="weekend">Weekend</option>
                  </select>
                  <span id='batch'><?php echo $batchy;?></span>
				  </td>
                  </tr>
                  <tr>
                  <th>Address</th>
                  <td><input type="text" style='display:none;' class="txtableaddr"  value="<?php echo $address;?>" >
				  <span id='areaaddr'><?php echo $address;?></span>
				  </td>
                  </tr>
                <?php
		$i++;
	}
		
}
?>
                </thead>
                <tbody>

                  
                                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		<div  class="col-md-5">
          <!-- Widget: user widget style 1 -->
          <div id='tabledatapic' class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('../../dist/img/photo1.png') center center;">
            
              <h2 class="widget-user-username pull-right"><?php echo ucfirst($contact); ?></h2>
              <h2 class="widget-user-username"><?php echo ucfirst($name); ?></h2>
              <h5 class="widget-user-desc"><?php echo ucfirst($occupation); ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" style='width:120px;border-radius:20% ;margin-left:-10px;margin-top:-15px;max-height: 125px;' src="<?php echo $myfile;?>" alt="User Avatar">
            </div><br/>
            <div class="box-footer"> 
              <div class="row">
                <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo ucfirst($batchy); ?></h5>
                    <span class="description-text">Batch Day</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h6 class="description-header"><?php echo $email ?></h6>
                    <span class="description-text">EMAIL</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $age ?></h5>
                    <span class="description-text">AGE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
			  <!-- /.row -->
            </div>
          </div>
		  <input class='btn btn-block btn-primary btn-lg' id='edit' value='Update' type='button'/>
            
          <!-- /.widget-user -->
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
    <strong>Copyright &copy; 2016 <a href="#">Blackk<span class="text-green">ShadowzZz</span></a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!--Popup script-->
 <!--<script src="../popup/popModal.js"></script>-->
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
<script src="../../plugins/pace-macosx.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script type="text/javascript">
$.ajaxSetup({ cache: false });
  $(function () {

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true ,
      format: 'dd/mm/yy'
    });

  });
	var j=1;
	$(document).ajaxStart(function() { Pace.restart(); });
function feespaid(studid,paid) {
		
	 if($('#feesinput').val()){
	 var feesvalue=$('#feesinput').val();
	 $('#feesedit').innerHTML="updating..";
	 //alert(feesvalue);
  $.get("duescalc.php?studid="+studid+"&paidamt="+feesvalue,function(data){
	fulldata=data.split("|");
	 $('#feespaid').html(fulldata[0]);
	 $('#feesdues').html(fulldata[1]);
	 //alert(fulldata[0]);
	 $('#feesinput').val('');
	$('#feesedit').innerHTML="Pay";
   });
  } //endIF
 
}
</script>

<script>
var i=1;
//$('.emailand_clas').attr('readonly','readonly');
$("#edit").click(function() {
if(i%2==0)			/*Enables textarea/Editing Fileds to comeup*/
{
	var urly="name="+$('.txtablename').val()+"&email="+$('.txtableemail').val()+"&doj="+$('.txtabledoj').val()+"&contact="+$('.txtablecontact').val()+"&fees="+$('.txtablefees').val()+"&address="+$('.txtableaddr').val()+"&batch="+$('.batch').val()+"&gender="+$('.txtablegender').val()+"&occupation="+$('.txtableoccu').val();

 //$('.txtableid').hide();
  $('.txtablename').hide();
   $('.txtableemail').hide();
    $('.txtableaddr').hide();
     $('.txtablecontact').hide();
      $('.txtablefees').hide();
      $('.batch').hide();
      $('.txtablegender').hide();
      $('.txtableoccu').hide();
       $('.txtabledoj').hide();
        
 $('#areaname').html($('.txtablename').val());
$('#areaemail').html($('.txtableemail').val());
$('#areadoj').html($('.txtabledoj').val());
$('#areaaddr').html($('.txtableaddr').val());
$('#areacontact').html($('.txtablecontact').val());
$('#areafees').html($('.txtablefees').val()); 
$('#areagender').html($('.txtablegender').val()); 
$('#areaoccu').html($('.txtableoccu').val()); 
$('#batch').html($('.batch').val()); 
  
  $.get("viewdetail.php?id="+$('.txtableid').val()+"&updatefields=1&"+urly,function(){

	$('#tabledatapic').load("viewdetail.php?id="+$('.txtableid').val()+" #tabledatapic>*", "");
	  });
 $('#areaname').show();
 $('#areaemail').show();
 $('#areadoj').show();
 $('#areaaddr').show();
 $('#areacontact').show();
  $('#areafees').show();
  $('#areagender').show();
  $('#areaoccu').show();
  $('#batch').show();
}
else{
 //$('#areaid').hide();
 $('#areaaddr').hide();
 $('#areaname').hide();
 $('#areacontact').hide();
 $('#areafees').hide();
 $('#areadoj').hide();
 $('#areaemail').hide();
 $('#areagender').hide();
 $('#areaoccu').hide();
 $('#batch').hide();
 
 $('.batch').show();
$('.txtablename').show();
$('.txtableemail').show();
$('.txtabledoj').show();
$('.txtableaddr').show();
$('.txtablecontact').show();
$('.txtablefees').show();
$('.txtablegender').show();
$('.txtableoccu').show();
}
i+=1;
});
</script>
</body>
</html>