<?php
include 'stu-verify.php';
include 'dbcon.php';
$rollno = $_SESSION['rollno'];

if(isset($_POST['submit'])){
       
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $npassword = mysqli_real_escape_string($con, $_POST['npassword']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);




$q = "select * from sturegister where rollno = '$rollno' && password = '$password' ";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	
	if($npassword === $cpassword){

		$query = " update sturegister set password = '$npassword' where rollno ='$rollno' ";
		$iquery = mysqli_query($con, $query);
		if($iquery){
			header('location:logout.php');
		}
	}else{
		?>
	<script type="text/javascript">
		alert('Password Mismatch !!');
	</script>
	<?php
	}
	
	
}else{
	?>
	<script type="text/javascript">
		alert('Invalid Password !!');
	</script>
	<?php
	}

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Password</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	
    <div class="container">
    	<h4 class="p-3 mb-2 bg-primary text-white" style="text-align: center; padding-top: 10px">Change Password</h4>
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
	<form style="text-align: center; padding-top: 50px; line-height: 10px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="password" class="form-control" name="password" placeholder="Recent Password" required=""><br>
		<input type="password" class="form-control" name="npassword" placeholder="Create New Password" required=""><br>
		<input type="password" class="form-control" name="cpassword" placeholder="Confirm New Password" required=""><br>
		<button type="submit" class="btn btn-primary" name="submit">Update Password</button>
	</form>
    <br>
	<h6 style="text-align: center;"><a href="stuhome.php">Back</a></h6>
</div>
</div>
</div>

</body>
</html>