<?php
session_start();
if(isset($_SESSION['fa'])){
	header('location.fahome.php');
}
else
	header('location:index.php');



?>