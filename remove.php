<?php
session_start();
include 'dbcon.php';
$cid = $_GET['cid'];

$query = "DELETE FROM `elective_course` WHERE code = '$cid' " ;
$iquery = mysqli_query($con, $query);

if($iquery){
	header('location:elective.php');
}



?>