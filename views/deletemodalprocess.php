<?php session_start();
include('includes/dbconn.php');
if(isset($_POST['delete'])){
	$id = $_POST['id'];
	$prod_type = $_SESSION['prod_type'];

	$sql= ("DELETE from $prod_type WHERE id = '$id'") or die (mysqli_error());
	$result=mysqli_query($con, $sql);
	header("location:update_cnp.php");
	
	}?>