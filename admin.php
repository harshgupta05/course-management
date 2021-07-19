<?php
session_start();
include 'dbcon.php';

if (isset($_POST['submit'])){
	$mail = mysqli_real_escape_string($con, $_POST['mail']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$q = "select * from admin where email = '$mail' && password = '$password' ";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	
	
	header('location:admin-board.php');
}else{
	?>
	<script type="text/javascript">
		alert('Invalid User !!');
	</script>
	<?php
}
	}




?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
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
	<input type="text" class="form-control" name="mail" required="" placeholder="ID"><br>
	<input type="password" class="form-control" name="password" required="" placeholder="Password"><br>
	<button type="submit" class="btn btn-primary" name="submit">Admin Login</button>
</form>

</div></div></div>

</body>
</html>