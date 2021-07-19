<!DOCTYPE html>
<html>
<head>
	<title>Student Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<?php
	include 'stu-verify.php';
    include 'dbcon.php';
    $rollno = $_SESSION['rollno'];
    $q = "select * from sturegister where rollno = '$rollno' ";

    $result = mysqli_query($con, $q);
    $data = mysqli_fetch_array($result);

	if(isset($_POST['submit'])){
        
        $rollno = mysqli_real_escape_string($con, $_POST['rollno']);
        $branch = mysqli_real_escape_string($con, $_POST['branch']);
        $semester = mysqli_real_escape_string($con, $_POST['semester']);
        $contact = mysqli_real_escape_string($con, $_POST['contact']);
      


        $emailquery = "update sturegister set branch = '$branch', semester = '$semester', contact = '$contact' where rollno = '$rollno' ";
        $query = mysqli_query($con,$emailquery);

       if($query){
        header('location:stuhome.php');
       }


    }



	?>

    <div class="container">
        <h4 class="p-3 mb-2 bg-primary text-white" style="text-align: center; padding-top: 10px">Profile Update</h4>
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            
	<form style="text-align: center; padding-top: 50px; line-height: 10px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $data['name'] ?>" readonly><br>
		<input type="email" class="form-control" name="mail" placeholder="NITC Mail ID" value="<?php echo $data['mail'] ?>" readonly><br>
		<input type="text" class="form-control" name="rollno" placeholder="Roll No" value="<?php echo $data['rollno'] ?>" readonly><br>
		<input type="text" class="form-control" name="branch" placeholder="Branch" value="<?php echo $data['branch'] ?>" required=""><br>
		<input type="text" class="form-control" name="semester" placeholder="Semester" value="<?php echo $data['semester'] ?>" required=""><br>
		<input type="text" class="form-control" name="contact" placeholder="Contact Number" value="<?php echo $data['contact'] ?>" required=""><br>
		
		<button type="submit" class="btn btn-primary" name="submit">Update</button>
	</form>
    <br>
	<h6 style="text-align: center;"><a href="stuhome.php">Back</a> | <a href="stu-pass-update.php">Change Password</a></h6>
</div>
</div>
</div>


</body>
</html>