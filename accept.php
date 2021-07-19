<?php
session_start();
include 'dbcon.php';

$code = $_GET['cid'];
$rollno = $_GET['sid'];

$q = "UPDATE `enroll` SET `status`= 'Accepted' WHERE `enroll`.`rollno` = '$rollno' AND `enroll`.`code` = '$code' ";
$iq = mysqli_query($con, $q);
header('location:view.php?sid='.$rollno);
	

?>