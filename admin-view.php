<!DOCTYPE html>
<html>
<head>
	<title>View Student Details</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<?php
session_start();
include 'dbcon.php';

$rollno = $_GET['sid'];

$query2 = "select * from sturegister where rollno = '$rollno' ";
$iquery2 = mysqli_query($con, $query2);
$userdata = mysqli_fetch_array($iquery2);

$branch = $userdata['branch'];
$sem = $userdata['semester'];

$query3 = "select * from faregister where branch = '$branch' and sem = '$sem' ";
$iquery3 = mysqli_query($con,$query3);
$fadata = mysqli_fetch_array($iquery3);

$query = "select * from enroll where rollno = '$rollno'";
$iquery = mysqli_query($con, $query);


?>
<div class="container">
<h5 class="p-3 mb-2 bg-primary text-white" style="text-align: center; padding-top: 10px">Details of <?php echo $userdata['name']  ?> </h5>
<p style="padding-left: 100px">Name : <?php echo $userdata['name']  ?><br>Roll No : <?php echo $userdata['rollno']  ?><br>Branch : <?php echo $userdata['branch']  ?><br>Semester : <?php echo $userdata['semester']  ?><br>FA : <?php echo $fadata['name']  ?></p>

<h5 class="text-primary">Enrolled Elective</h5>
<table class="table table-striped" style="font-size: 17px;">
	<tr>
		<thead>
		<th scope="col" >Sl No.</th>
		<th scope="col" >Code</th>
		<th scope="col" >Title</th>
		<th scope="col" >Credit</th>
		<th scope="col" >Slot</th>
		
		<th scope="col" >Status</th>
	</thead>
	</tr>
	<?php
	$i=1;
	while ($row = $iquery->fetch_assoc()) {
		$code = $row['code'];
		$q1 = "select * from elective_course where code = '$code' ";
		$iq1 = mysqli_query($con, $q1);
		$data = mysqli_fetch_array($iq1);

		$q = "SELECT * FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' AND `enroll`.`code` = '$code' ";
			$iq = mysqli_query($con, $q);
			$num = mysqli_num_rows($iq);

			if($num==1){
				$userdata = mysqli_fetch_array($iq);
				$value = $userdata['status'];
			}else{
				$value = "";
			}


		echo "
		<tr>
		<td>".$i."</td>
		<td>".$data['code']."</td>
		<td>".$data['title']."</td>
		<td>".$data['credit']."</td>
		<td>".$data['slot']."</td>
		
		<td>".$value."</td>
	</tr>";
	$i++;
	}


	?>
	
</table>
<a href="stu-manage.php"><button class="btn btn-info btn-sm">Back</button></a>
</div>
</body>
</html>