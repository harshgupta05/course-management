<?php
session_start();
include 'dbcon.php';

$query = "select * from faregister" ;
$result2 = mysqli_query($con, $query);


?>
<!DOCTYPE html>
<html>
<head>
	<title>FA List</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h4 class="p-3 mb-2 bg-primary text-white" style="text-align: center; padding-top: 10px">Manage FA</h4>

		<table  class="table table-striped" style="font-size: 17px;">
		<thead>
		<tr>
			<th scope="col">Sl No.</th>
			<th scope="col">FA Name</th>
			<th scope="col">Email</th>
			<th scope="col">Contact</th>
			<th scope="col">Department</th>
			<th scope="col">Branch</th>
			<th scope="col">Semester</th>
			<th scope="col">Edit</th>
		</tr>
	</thead>
	<?php
	$i=1;
		while ($row = $result2->fetch_assoc()){

			echo "
			<tr>
			<td>".$i."</td>
			<td>".$row['name']."</td>
			<td>".$row['mail']."</td>
			<td>".$row['contact']."</td>
			<td>".$row['department']."</td>
			<td>".$row['branch']."</td>
			<td>".$row['sem']."</td>
		
			<td><a href = 'http://localhost/elective_management/fa-edit.php?cid=".$row['id']."'>Edit</a></td>
		</tr>
			";
			$i++;
		}


	?>
</table>
<div class="text-center">
	<a href="admin-board.php"><button type="button" class="btn btn-primary">Back</button></a>
</div>
	</div>

</body>
</html>