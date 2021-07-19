<?php
session_start();
include'dbcon.php';

$cid = $_GET['cid'];

$q = "select * from elective_course where code = '$cid' ";
$iq = mysqli_query($con, $q);

$data =mysqli_fetch_array($iq);


if(isset($_POST['submit'])){
	$code = mysqli_real_escape_string($con, $_POST['code']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $credit = mysqli_real_escape_string($con, $_POST['credit']);
    $slot = mysqli_real_escape_string($con, $_POST['slot']);
    $branch = mysqli_real_escape_string($con, $_POST['branch']);
    $sem = mysqli_real_escape_string($con, $_POST['sem']);

$query = " UPDATE `elective_course` SET `title`='$title',`credit`= '$credit',`slot`= '$slot',`branch`= '$branch',`sem`= '$sem' WHERE code = '$code' ";
$iquery = mysqli_query($con, $query);

if($iquery){
	header('location:elective.php');
}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Elective</title><meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h4 class="p-3 mb-2 bg-primary text-white" style="text-align: center; padding-top: 10px">Edit Elective</h4>

		 <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
     
	<form style="text-align: center; padding-top: 50px; line-height: 10px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="text" class="form-control" name="code" placeholder="Elective Code" value="<?php echo $data['code'] ?>" readonly><br>
		<input type="text" class="form-control" name="title" placeholder="Elective Title" value="<?php echo $data['title'] ?>" required="" readonly><br>
		<input type="text" class="form-control" name="credit" placeholder="Credit" value="<?php echo $data['credit'] ?>" required=""><br>
		<input type="text" class="form-control" name="slot" placeholder="Slot" value="<?php echo $data['slot'] ?>" required=""><br>
		<input type="text" class="form-control" name="branch" placeholder="Branch" value="<?php echo $data['branch'] ?>" required=""><br>
		<input type="text" class="form-control" name="sem" placeholder="Semester" value="<?php echo $data['sem'] ?>" required=""><br>
		<button type="submit" class="btn btn-primary" name="submit">Update Elective</button>
	</form>
    <br>
	<h6 style="text-align: center;"><a href="elective.php">Back</a></h6>
</div>
</div>
	</div>

</body>
</html>