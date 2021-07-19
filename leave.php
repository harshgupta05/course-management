<?php
session_start();
include 'dbcon.php';

$code = $_GET['cid'];
$rollno = $_SESSION['rollno'];

$q = "DELETE FROM `enroll` WHERE `enroll`.`rollno` = '$rollno' AND `enroll`.`code` = '$code' ";
$iq = mysqli_query($con, $q);
header('location:stuhome.php');
	
?>