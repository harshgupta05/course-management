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
	session_start();
	include 'dbcon.php';
	$_SESSION['msg'] = "";

	if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $mail = mysqli_real_escape_string($con, $_POST['mail']);
        $rollno = mysqli_real_escape_string($con, $_POST['rollno']);
        $branch = mysqli_real_escape_string($con, $_POST['branch']);
        $semester = mysqli_real_escape_string($con, $_POST['semester']);
        $contact = mysqli_real_escape_string($con, $_POST['contact']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);


        $emailquery = "select * from sturegister where mail = '$mail' ";
        $query = mysqli_query($con,$emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
            ?>
            <script type="text/javascript">
                alert("Email already Exist !!");
            </script>
          <?php
        }else{
        	if($password === $cpassword){
        		$insertquery = "INSERT INTO `sturegister`(`name`, `mail`, `rollno`, `branch`, `semester`, `contact`, `password`) VALUES ('$name', '$mail' ,'$rollno','$branch','$semester','$contact','$password')";
        		$iquery = mysqli_query($con, $insertquery);
            if($iquery){
                ?>
            <script type="text/javascript">
                alert("Register Successfull");
            </script>
          <?php
            	
            	header('location:login.php');
            }
        	}else{
        		?>
            <script type="text/javascript">
                alert("Password Missmatch");
            </script>
          <?php
        	}
        }

    }



	?>

    <div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <a href="index.php"><h1 class="text-center pt-3 text-info">EMS</h1></a>
	<form style="text-align: center; padding-top: 50px; line-height: 10px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="text" class="form-control" name="name" placeholder="Name" required><br>
		<input type="email" class="form-control" name="mail" placeholder="NITC Mail ID" required=""><br>
		<input type="text" class="form-control" name="rollno" placeholder="Roll No" required=""><br>
		<input type="text" class="form-control" name="branch" placeholder="Branch" required=""><br>
		<input type="text" class="form-control" name="semester" placeholder="Semester" required=""><br>
		<input type="text" class="form-control" name="contact" placeholder="Contact Number" required=""><br>
		<input type="password" class="form-control" name="password" placeholder="Create Password" required=""><br>
		<input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required=""><br>
		<button type="submit" class="btn btn-primary" name="submit">Student Register</button>
	</form>
    <br>
	<h6 style="text-align: center;"><a href="falogin.php">Student Login</a></h6>
</div>
</div>
<p style="font-size: 14px">For <strong>Master of Computer Applications</strong> type <strong>MCA</strong> | 
    For <strong>Bachelor of technology</strong> type <strong>BTECH</strong> | 
    For <strong>Master of technology</strong> type <strong>MTECH</strong><br>
    For <strong>1st Semester</strong> type <strong>FIRST</strong> | 
    For <strong>2nd Semester</strong> type <strong>SECOND</strong> | 
    For <strong>3rd Semester</strong> type <strong>THIRD</strong> | 
    For <strong>4th Semester</strong> type <strong>FOURTH</strong> | 
    For <strong>5th Semester</strong> type <strong>FIFTH</strong> | 
    For <strong>6th Semester</strong> type <strong>SIXTH</strong> | 
</p>
</div>


</body>
</html>