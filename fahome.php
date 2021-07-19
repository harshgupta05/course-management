<!DOCTYPE html>
<html>
<head>
	<title>FA Dashboard</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<?php
	include 'verify.php';
	include 'dbcon.php';
	$mail = $_SESSION['fa'];
	$q = "select * from faregister where mail = '$mail'";
	$iq = mysqli_query($con, $q);
	$userdata = mysqli_fetch_array($iq);

	$branch = $userdata['branch'];
	$sem = $userdata['sem'];
	?>
<div class="container">
<h4 class="p-3 mb-2 bg-primary text-white" style="text-align: center; padding-top: 10px">FA Dashboard</h4>
<p style="padding-left: 300px">Name : <?php echo $userdata['name'] ?> <br>Email : <?php echo $userdata['mail'] ?> <br>Department : <?php echo $userdata['department'] ?><br>Contact : <?php echo $userdata['contact'] ?><p>
	<hr>


	<form class="row g-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="col-3">
   
   <h5 class="text-info">Student Enrollment</h5>
  </div>
  <div class="col-6">
    
    <input type="text" class="form-control" name="search-text" placeholder="Search by Name or Roll No">
  </div>
  <div class="col-3">
    <button type="submit" name="search" class="btn btn-info mb-3">Search Student</button>
  </div>
</form>


<?php
if(isset($_POST['search'])){
	$text = mysqli_real_escape_string($con, $_POST['search-text']);
	$sql = "select * from sturegister where branch = '$branch' and semester = '$sem' and (name like '%$text%' OR rollno like '$text') ";
	$sqli = mysqli_query($con, $sql);
	$numr = mysqli_num_rows($sqli);
	if($numr == 0){
		echo '<h6 class="p-3 mb-2 bg-danger text-white" style="text-align: center;">No Result found</h6>';
	}else{

		echo'<table class="table table-striped" style="font-size: 17px;">
	<thead>
	<tr>
		<th scope="col">Sl No.</th>
		<th scope="col">Student Name</th>
		<th scope="col">Roll No</th>
		<th scope="col">Branch</th>
		<th scope="col">Semester</th>
		<th scope="col">View</th>
		<th scope="col">Status</th>
	</tr>
</thead>';

$i=1;
		while ($row = $sqli->fetch_assoc()){

			$rollno = $row['rollno'];

		$q0 = "SELECT `rollno` FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' ";
		$iq0 = mysqli_query($con, $q0);
		$num0 = mysqli_num_rows($iq0);


		$q1 = "SELECT `rollno` FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' AND `enroll`.`status` = 'Accepted' ";
		$iq1 = mysqli_query($con, $q1);
		$num1 = mysqli_num_rows($iq1);

		$q2 = "SELECT `rollno` FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' AND `enroll`.`status` = 'Rejected' ";
		$iq2 = mysqli_query($con, $q2);
		$num2 = mysqli_num_rows($iq2);

		if($num1 == $num0 && $num0 > 0){
			$value = 'Accepted';
		}
		else if($num2 == $num0 && $num0 > 0){
			$value = 'Rejected';
		}
		else if($num1 < $num0 && $num0 > 0){
			$value = 'Partially Accepted';
		}
		else if($num0 == 0){
			$value = 'Not Completed by Student';
		}else{
			$value = 'Pending';
		}

		echo "<tr>
		<td>".$i."</td>
		<td>".$row['name']."</td>
		<td>".$row['rollno']."</td>
		<td>".$row['branch']."</td>
		<td>".$row['semester']."</td>
		<td><a href='http://localhost/elective_management/view.php?sid=".$row['rollno']."' <button>View</button></td>
		<td>".$value."</td>
	</tr>";
	$i++;
			}

			echo '</table>';
	}

}


?>


<table class="table table-striped" style="font-size: 17px;">
	<thead>
	<tr>
		<th scope="col">Sl No.</th>
		<th scope="col">Student Name</th>
		<th scope="col">Roll No</th>
		<th scope="col">Branch</th>
		<th scope="col">Semester</th>
		<th scope="col">View</th>
		<th scope="col">Status</th>
	</tr>
</thead>
	<?php
	$query = "select * from sturegister where branch = '$branch' and semester = '$sem' " ;
	$iquery = mysqli_query($con,$query);

	$i=1;
	while ($row = $iquery->fetch_assoc()){

		$rollno = $row['rollno'];

		$q0 = "SELECT `rollno` FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' ";
		$iq0 = mysqli_query($con, $q0);
		$num0 = mysqli_num_rows($iq0);


		$q1 = "SELECT `rollno` FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' AND `enroll`.`status` = 'Accepted' ";
		$iq1 = mysqli_query($con, $q1);
		$num1 = mysqli_num_rows($iq1);

		$q2 = "SELECT `rollno` FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' AND `enroll`.`status` = 'Rejected' ";
		$iq2 = mysqli_query($con, $q2);
		$num2 = mysqli_num_rows($iq2);

		if($num1 == $num0 && $num0 > 0){
			$value = 'Accepted';
		}
		else if($num2 == $num0 && $num0 > 0){
			$value = 'Rejected';
		}
		else if($num1 < $num0 && $num0 > 0){
			$value = 'Partially Accepted';
		}
		else if($num0 == 0){
			$value = 'Not Completed by Student';
		}else{
			$value = 'Pending';
		}

		echo "<tr>
		<td>".$i."</td>
		<td>".$row['name']."</td>
		<td>".$row['rollno']."</td>
		<td>".$row['branch']."</td>
		<td>".$row['semester']."</td>
		<td><a href='http://localhost/elective_management/view.php?sid=".$row['rollno']."' <button>View</button></td>
		<td>".$value."</td>
	</tr>";
	$i++;
	}



	?>
	

</table>
<div style="text-align: center; padding-top: 20px">
		<a href="fa-update.php"><button class="btn btn-info">Update Profile</button> </a>
		<a href="logout.php"><button class="btn btn-danger">Logout</button> </a>
	</div>
</div>
</body>
</html>