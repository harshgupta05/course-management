<?php
session_start();
include 'dbcon.php';

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
		<h4 class="p-3 mb-2 bg-primary text-white" style="text-align: center; padding-top: 10px">Admin Board</h4>
		<div class="text-center">
			<p>Hello Admin ! Welcome to Admin Board.</p>
		<a href="elective.php"><button class="btn btn-primary">Manage Elective</button></a>
		<a href="fa-manage.php"><button class="btn btn-primary">Manage FA</button></a>
		<a href="stu-manage.php"><button class="btn btn-primary">Manage Student</button></a>
		<a href="logout.php"><button class="btn btn-info">Logout</button></a>

	</div>
			
		</div>
	</div>

</body>
</html>