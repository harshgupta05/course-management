<!DOCTYPE html>
<html>
<head>
	<title>Downlod Your Slip</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<?php
	session_start();
	ob_start();
	include 'dbcon.php';
	$rollno = $_SESSION['rollno'];
	$q = "select * from sturegister where rollno = '$rollno' ";

	$result = mysqli_query($con, $q);
	$userdata = mysqli_fetch_array($result);

	$query = "select * from elective_course" ;
	$result2 = mysqli_query($con, $query);
	$count = mysqli_num_rows($result2);

	if (!isset($_SESSION['status'])) {
		$_SESSION['status'] = '';
	}

	?>
<div class="container">
	<h4 class="text-primary" style="padding-top: 10px; text-align: center;">National Institute of Technology Calicut</h4>

	<h5 style=" text-align: center;"><strong>Elective Slip</strong></h5>
	<hr>
	<h6 style="padding-left: 200px">Name : <?php echo $userdata['name']  ?><br>Roll No : <?php echo $userdata['rollno']  ?><br>Branch : <?php echo $userdata['branch']  ?><br>Semester : <?php echo $userdata['semester']  ?></h6>
	<hr>
	<h5 class="text-info" style="text-align: center;">Selected Elective Courses for this Session</h5>
	<table class="table table-striped">
		<thead><tr>
			
			<th scope="col">Sl No.</th>
			<th scope="col">Code</th>
			<th scope="col">Title</th>
			<th scope="col">Credit</th>
			<th scope="col">Slot</th>

		</tr></thead>

		<?php

		$i = 1;
		$q1 = "SELECT * FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' AND `enroll`.`status` = 'Accepted' ";
		$iq1 = mysqli_query($con, $q1);
		while ($row = $iq1->fetch_assoc()) {
			
		$code = $row['code'];
		$q0 = "select * from elective_course where code = '$code' ";
		$iq0 = mysqli_query($con, $q0);
		$data = mysqli_fetch_array($iq0);

			echo "
			<tr>
			<td>".$i."</td>
			<td>".$data['code']."</td>
			<td>".$data['title']."</td>
			<td>".$data['credit']."</td>
			<td>".$data['slot']."</td>
			</tr>" ;
		$i++;
		}

		?>
		
	</table>
	<div style="text-align: center; padding-top: 50px;">
	<button onclick="window.print()">Download</button>
</div>
</div>
</body>
</html>