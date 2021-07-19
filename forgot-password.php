<?php
session_start();
$_SESSION['pass'] = "";
include 'dbcon.php';

if(isset($_POST['submit'])){

	$mail = mysqli_real_escape_string($con, $_POST['mail']);
	$contact = mysqli_real_escape_string($con, $_POST['contact']);

	$q = "select * from sturegister where mail = '$mail' && contact = '$contact' ";

$result = mysqli_query($con, $q);
$num = mysqli_num_rows($result);
if($num == 1){
	$userdata = mysqli_fetch_array($result);
	$_SESSION['pass'] = $userdata['password'];
}else{
	?>
            <script type="text/javascript">
                alert("User not exist !!");
            </script>
          <?php
}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<a href="index.php"><h1 class="text-center pt-3 text-info">EMS</h1></a>
			<form style="text-align: center; padding-top: 100px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<input type="email" name="mail" class="form-control" placeholder="Enter NITC Mail"><br>
			<input type="text" class="form-control" name="contact" placeholder="Contact Number" required=""><br>
			<button type="submit" name="submit" class="btn btn-primary">Get Password</button>
		</form>
			<input type="text" class="form-control" value="<?php if(isset($_SESSION['pass'])){ echo($_SESSION['pass']);} ?>" name="password" placeholder="Your Password is" >
		</div>
	</div>
</div>
</body>
</html>