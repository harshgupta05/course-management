<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
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
	$userdata = mysqli_fetch_array($result);

	$sem = $userdata['semester'];
	$branch = $userdata['branch'];

	$query = "select * from elective_course where sem = '$sem' and branch = '$branch'" ;
	$result2 = mysqli_query($con, $query);
	$count = mysqli_num_rows($result2);

	if (!isset($_SESSION['status'])) {
		$_SESSION['status'] = '';
	}

	?>
<div class="container">
	<h4 class="p-3 mb-2 bg-primary text-white" style="text-align: center; padding-top: 10px">Student Dashboard</h4>
	<h5 class="text-info">Your Details</h5>
	<hr>
	<p style="padding-left: 300px" >Name : <?php echo $userdata['name']  ?><br>Roll No : <?php echo $userdata['rollno']  ?><br>Branch : <?php echo $userdata['branch']  ?><br>Semester : <?php echo $userdata['semester']  ?></p>
	
<hr>

	<form class="row g-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="col-3">
   
   <h5 class="text-info">Select Elective</h5>
  </div>
  <div class="col-6">
    
    <input type="text" class="form-control" name="search-text" placeholder="Search by Code or Name">
  </div>
  <div class="col-3">
    <button type="submit" name="search" class="btn btn-info mb-3">Search Elective</button>
  </div>
</form>

<?php
if(isset($_POST['search'])){
	$text = mysqli_real_escape_string($con, $_POST['search-text']);
	$sql = "select * from elective_course where sem = '$sem' and branch = '$branch' and ( code like '$text' OR title like '%$text%')";
	$sqli = mysqli_query($con, $sql);
	$numr = mysqli_num_rows($sqli);
	if($numr == 0){
		echo '<h6 class="p-3 mb-2 bg-danger text-white" style="text-align: center;">No Result found</h6>';
	}else{

		echo' <table  class="table table-striped" style="font-size: 17px;">
		<thead>
		<tr>
			<th scope="col">Sl No.</th>
			<th scope="col">Elective Code</th>
			<th scope="col">Elective</th>
			<th scope="col">Credits</th>
			<th scope="col">Slot</th>
			<th scope="col">Enroll</th>
			<th scope="col">Status</th>
		</tr>
	</thead>';


		$i=1;
		while ($row = $sqli->fetch_assoc()){

			$code = $row['code'];

			$q = "SELECT * FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' AND `enroll`.`code` = '$code' ";
			$iq = mysqli_query($con, $q);
			$num = mysqli_num_rows($iq);

			if($num==1){
				$userdata = mysqli_fetch_array($iq);
				$value = $userdata['status'];
			}else{
				$value = "";
			}

			if($value != ""){
				$add = "<a href = 'http://localhost/elective_management/leave.php?cid=".$row['code']."'><button class='btn btn-danger btn-sm'>Leave</button></a>" ;
			}else
			$add ="";

			echo "
			<tr>
			<td>".$i."</td>
			<td>".$row['code']."</td>
			<td>".$row['title']."</td>
			<td>".$row['credit']."</td>
			<td>".$row['slot']."</td>
			<td><a href = 'http://localhost/elective_management/enroll.php?cid=".$row['code']."'><button class='btn btn-primary btn-sm'>Enroll</button></a>".$add."</td>
			<td>".$value."</td>
		</tr>
			";
			$i++;
		

		}
	}
	echo '</table>';

}


?>

	
	<table  class="table table-striped" style="font-size: 17px;">
		<thead>
		<tr>
			<th scope="col">Sl No.</th>
			<th scope="col">Elective Code</th>
			<th scope="col">Elective</th>
			<th scope="col">Credits</th>
			<th scope="col">Slot</th>
			<th scope="col">Enroll</th>
			<th scope="col">Status</th>
		</tr>
	</thead>
		<?php
		$i=1;
		while ($row = $result2->fetch_assoc()) {
			
			$code = $row['code'];

			$q = "SELECT * FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' AND `enroll`.`code` = '$code' ";
			$iq = mysqli_query($con, $q);
			$num = mysqli_num_rows($iq);

			if($num==1){
				$userdata = mysqli_fetch_array($iq);
				$value = $userdata['status'];
			}else{
				$value = "";
			}

			if($value != ""){
				$add = "<a href = 'http://localhost/elective_management/leave.php?cid=".$row['code']."'><button class='btn btn-danger btn-sm'>Leave</button></a>" ;
			}else
			$add ="";

			echo "
			<tr>
			<td>".$i."</td>
			<td>".$row['code']."</td>
			<td>".$row['title']."</td>
			<td>".$row['credit']."</td>
			<td>".$row['slot']."</td>
			<td><a href = 'http://localhost/elective_management/enroll.php?cid=".$row['code']."'><button class='btn btn-primary btn-sm'>Enroll</button></a>".$add."</td>
			<td>".$value."</td>
		</tr>
			";
			$i++;
		
		}



		?>
		
	</table>

	<div style="text-align: center; padding-top: 20px">
		<a href="stu-update.php"><button class="btn btn-info">Update Profile</button> </a>
		<a href="download.php"><button class="btn btn-primary">Download Slip</button> </a>
		<a href="logout.php"><button class="btn btn-danger">Logout</button> </a>
	</div>
</div>
<br>
<br>


</body>
</html>