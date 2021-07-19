<?php
session_start();
if(isset($_SESSION['rollno'])){
	header('location.stuhome.php');
}
else
	header('location:index.php');

?>