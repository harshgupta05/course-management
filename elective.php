<?php
session_start();
include 'dbcon.php';

$query = "select * from elective_course" ;
	$result2 = mysqli_query($con, $query);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Elective</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<div class="container">
<h4 class="p-3 mb-2 bg-primary text-white" style="text-align: center; padding-top: 10px">Manage Elective</h4>
<table  class="table table-striped" style="font-size: 17px;">
		<thead>
		<tr>
			<th scope="col">Sl No.</th>
			<th scope="col">Elective Code</th>
			<th scope="col">Elective</th>
			<th scope="col">Credits</th>
			<th scope="col">Slot</th>
			<th scope="col">Branch</th>
			<th scope="col">Semester</th>
			<th scope="col">Edit</th>
			<th scope="col">Remove</th>
			
		</tr>
	</thead>
	<?php
	$i=1;
		while ($row = $result2->fetch_assoc()){

			echo "
			<tr>
			<td>".$i."</td>
			<td>".$row['code']."</td>
			<td>".$row['title']."</td>
			<td>".$row['credit']."</td>
			<td>".$row['slot']."</td>
			<td>".$row['branch']."</td>
			<td>".$row['sem']."</td>
			<td><a href = 'http://localhost/elective_management/edit.php?cid=".$row['code']."'><button class='btn btn-info btn-sm'>Edit</button></a></td>
			<td><a href = 'http://localhost/elective_management/remove.php?cid=".$row['code']."'><button class='btn btn-danger btn-sm'>Remove</button></a></td>
		</tr>
			";
			$i++;
		}


	?>

	</table>


	<div style="text-align: center; padding-top: 20px">
		<a href="admin-board.php"><button class="btn btn-info">Back</button> </a>
		<a href="add.php"><button class="btn btn-primary">Add Elective</button> </a>
	</div>
</div>

</body>
</html>