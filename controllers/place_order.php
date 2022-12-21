<?php 

	session_start();

	include "../model/_dbconnect.php";


	if (isset($_POST['checkout_submit'])) {
		
		$uid = $_POST['uid'];
		$card_number = $_POST['card_number'];

		if (strlen($card_number) !=16) {
			echo "Invalid Length of Card Number";
			header( "refresh:2;url=cart.php" );
			die();
		}

		$cart_query = "SELECT * FROM `cart` WHERE `pd_uid` = '$uid'";
  		$cart_query_reault = mysqli_query($conn, $cart_query);

  		$row = mysqli_fetch_assoc($cart_query_reault);

  		$pd_name = $row['pd_name'];
		$pd_description = $row['pd_description'];
		$pd_type = $row['pd_type'];
		$pd_expire_date = $row['pd_expire_date'];
		$pd_batch_no = $row['pd_batch_no'];
		$pd_price = $row['pd_price'];
		$pd_quantity = $row['pd_quantity'];
		$buyer_name = $row['buyer_name'];
		$buyer_email = $row['buyer_email'];
		$checkout = 1;

		$checkout_update_query = "UPDATE `cart` SET `checkout` = '1' WHERE `cart`.`pd_uid` = '$uid'";
		$checkout_update_query_result = mysqli_query($conn, $checkout_update_query);

		$order_insert_query = "INSERT INTO `orders` (`id`, `uid`, `pd_name`, `pd_type`, `pd_description`, `pd_expire_date`, `pd_batch_no`, `pd_price`, `pd_quantity`, `buyer_name`, `buyer_email`, `card_number`) VALUES (NULL, '$uid', '$pd_name', '$pd_type', '$pd_description', '$pd_expire_date', '$pd_batch_no', '$pd_price', '$pd_quantity', '$buyer_name', '$buyer_email', '$card_number')";
		$order_query_result = mysqli_query($conn, $order_insert_query);

		if ($order_query_result) {
			echo "<script>alert('Order Placed Successfully');</script>";
			header("location: profile.php");
		}else{
			echo "CheckOut Error";
			die();
		}

	}else{
		header("location: cart.php");
	}



 ?>