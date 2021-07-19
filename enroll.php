<?php
session_start();
include 'dbcon.php';

$code = $_GET['cid'];
$rollno = $_SESSION['rollno'];

$q = "SELECT * FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' AND `enroll`.`code` = '$code' ";
$iq = mysqli_query($con, $q);
$num = mysqli_num_rows($iq);
if($num > 0){
	$userdata = mysqli_fetch_array($iq);
	$_SESSION['status'] = $userdata['status'];
	header('location:stuhome.php');
}else if($num == 0){
	$query = "INSERT INTO `enroll`( `rollno`, `code`, `status`) VALUES ('$rollno','$code','Pending')" ;
	$iquery = mysqli_query($con, $query);
	header('location:stuhome.php');
	$_SESSION['status'] = 'Pending';
}

?>