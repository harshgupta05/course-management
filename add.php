<?php
	session_start();
	include 'dbcon.php';
	

	if(isset($_POST['submit'])){
        $code = mysqli_real_escape_string($con, $_POST['code']);
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $credit = mysqli_real_escape_string($con, $_POST['credit']);
        $slot = mysqli_real_escape_string($con, $_POST['slot']);
        $branch = mysqli_real_escape_string($con, $_POST['branch']);
        $sem = mysqli_real_escape_string($con, $_POST['sem']);

        $codequery = "select * from elective_course where code = '$code' ";
        $query = mysqli_query($con,$codequery);

        $codecount = mysqli_num_rows($query);

        if($codecount>0){
            ?>
            <script type="text/javascript">
                alert("Elective alreday Exist !!");
            </script>
          <?php
        }else{

        	$query2 = " INSERT INTO `elective_course`(`code`, `title`, `credit`, `slot`, `branch`, `sem`) VALUES ('$code', '$title', '$credit', '$slot', '$branch', '$sem')";
        	$iquery = mysqli_query($con, $query2);

        	if($iquery){
        	header('location:elective.php');
        }
        	
        }


    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Elective</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h4 class="p-3 mb-2 bg-primary text-white" style="text-align: center; padding-top: 10px">Add Elective</h4>

		 <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            
	<form style="text-align: center; padding-top: 50px; line-height: 10px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="text" class="form-control" name="code" placeholder="Elective Code" required><br>
		<input type="text" class="form-control" name="title" placeholder="Elective Title" required=""><br>
		<input type="text" class="form-control" name="credit" placeholder="Credit" required=""><br>
		<input type="text" class="form-control" name="slot" placeholder="Slot" required=""><br>
        <input type="text" class="form-control" name="branch" placeholder="Branch" required=""><br>
        <input type="text" class="form-control" name="sem" placeholder="Semester" required=""><br>
		<button type="submit" class="btn btn-primary" name="submit">Add Elective</button>
	</form>
    <br>
	<h6 style="text-align: center;"><a href="elective.php">Back</a></h6>
</div>
</div>
	</div>

</body>
</html>