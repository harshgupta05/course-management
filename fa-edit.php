<?php
	session_start();
	include 'dbcon.php';
	$cid = $_GET['cid'];

    $query = "select * from faregister where id = '$cid' ";
    $iquery = mysqli_query($con, $query);
    $data = mysqli_fetch_array($iquery);



	if(isset($_POST['submit'])){
        $mail = mysqli_real_escape_string($con, $_POST['mail']);
        $branch = mysqli_real_escape_string($con, $_POST['branch']);
        $sem = mysqli_real_escape_string($con, $_POST['sem']);


        $query1 = " UPDATE `faregister` SET `branch`='$branch',`sem`='$sem' WHERE mail = '$mail' ";
        $iquery1 = mysqli_query($con, $query1);

        if($iquery1){
            header('location:fa-manage.php');
        }
        
}



	?>
<html>
<head>
	<title>Update FA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h4 class="p-3 mb-2 bg-primary text-white" style="text-align: center; padding-top: 10px">Update FA</h4>
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
           
	<form style="text-align: center; padding-top: 50px; line-height: 10px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $data['name'] ?>" readonly><br>
		<input type="email" class="form-control" name="mail" placeholder="NITC Mail ID" value="<?php echo $data['mail'] ?>" readonly><br>
		<input type="text" class="form-control" name="contact" placeholder="Contact No" value="<?php echo $data['contact'] ?>" readonly><br>
		<input type="text" class="form-control" name="department" placeholder="Department" value="<?php echo $data['department'] ?>" readonly><br>
		<input type="text" class="form-control" name="branch" placeholder="Branch" value="<?php echo $data['branch'] ?>" required=""><br>
		<input type="text" class="form-control" name="sem" placeholder="Semester" value="<?php echo $data['sem'] ?>"required=""><br>
		<button type="submit" class="btn btn-primary" name="submit">Update FA</button>
	</form>
    <br>
	<h6 style="text-align: center;"><a href="fa-manage.php">Back</a></h6>
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