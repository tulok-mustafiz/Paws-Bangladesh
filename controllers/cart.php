<?php 

	session_start();

	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    die();
}

require '_nav.php';

include "../model/_dbconnect.php";

if (isset($_POST['checkout'])) {
  $uid =  $_POST['pd_uid'];

  $cart_query = "SELECT * FROM `cart` WHERE `pd_uid` = '$uid'";
  $cart_query_reault = mysqli_query($conn, $cart_query);

  $uid = "";
  $pd_price = "";


}else{
	header("location: cart.php");
}

?>