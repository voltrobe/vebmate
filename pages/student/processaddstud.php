<?php
require_once('../include/connect.php');
$name      = trim($_POST['name']," ");
$address   = trim($_POST['address']," ");
$contact   = trim($_POST['contact']," ");
$email     = trim($_POST['email']," ");
$age       = $_POST['age'];
$doj       = $_POST['datepicker'];
$totalfees = trim($_POST['totalfees']," ");
$feespaid  = trim($_POST['feespaid']," ");
$batch     = $_POST['batch'];
$gender    = $_POST['gender'];
$occu      = trim($_POST['occupation']," ");
//$password = $_POST['password'];


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	define ("MAX_SIZE","1000");
	function getExtension($str)
	{
		$i = strrpos($str,".");
		if(!$i)
		{
			return "";
		}
		$l   = strlen($str) - $i;
		$ext = substr($str,$i + 1,$l);
		return $ext;
	}

	$errors = 0;
	$image  = $_FILES['image']['name'];
	if($image){
		$filename = stripslashes($_FILES['image']['name']);
		$extension= getExtension($filename);
		$extension= strtolower($extension);
		if(($extension != "jpg") && ($extension != "jpeg") && ($extension != "png")
			&& ($extension != "gif") && ($extension != "JPG") && ($extension != "JPEG")
			&& ($extension != "PNG") && ($extension != "GIF")){
			echo '<h3>Unknown extension!</h3>';
			$errors = 1;
		}
		else
		{
			$size = filesize($_FILES['image']['tmp_name']);

			if($size > MAX_SIZE * 1024){
				echo '<h4>You have exceeded the size limit!</h4>';
				$errors = 1;
			}

			$image_name = time().'.'.$extension;
			$myfile     = "../../uploads/".$image_name;

			$copied     = copy($_FILES['image']['tmp_name'], $myfile);
			if(!$copied){
				echo '<h3>Copy unsuccessfull!</h3>';
				$errors = 1;
			}
			//echo ' < h3 > uploaded successfull!</h3 > ';
			//$price = $_POST['price'];
			//  $decorname = $_POST['them_name'];
			//	mysql_query("insert into decoration (user_id,path,price,dcoration_name) values('".$usr_id."','".$newname."','".$price."','".$decorname."')");

		}
	}
}
$q = mysql_query("insert into student_info(name,email,contact,age,doj,totalfees,feespaid,address,myfile,batch,gender,occupation) values ('$name','$email','$contact','$age','$doj','$totalfees','$feespaid','$address','$myfile','$batch','$gender','$occu')");
if($q > 0){
	?>
	<script>
		alert(" Student added sucessfully");
		window.location.href="addstudent.php";
	</script>

	<?php
}
else
{
	?>
	<script>
		alert(" unable to insert Record");
		window.location.href="addstudent.php";
	</script>

	<?php
}
?>