<?php

session_start();

	$email = $_SESSION['email'];

    if (isset($_GET['uid'])) {
    	$animal_uid = $_GET['uid'];

    	include "../model/_dbconnect.php";

    	$user_query = "SELECT * FROM `users` WHERE `email`='$email'";
    	$user_query_result = mysqli_query($conn, $user_query);
    	$user_data = mysqli_fetch_assoc($user_query_result);
    	$username = $user_data['username'];
    	$location = $user_data['address'];

    	$query = "SELECT * FROM `animal` WHERE `uid`='$animal_uid'";
    	$result = mysqli_query($conn, $query);

    	if (mysqli_num_rows($result) == 1) {
    		$data = mysqli_fetch_assoc($result);

    		$donator_mail = $data['donator_mail'];
    		$uid = $data['uid'];
    		$name = $data['name'];
    		$age = $data['age'];
    		$health = $data['health'];
    		$type = $data['type'];
    		$gender = $data['gender'];
    		$picture = $data['picture'];

    		$adopted_query = "INSERT INTO `adopted` (`id`, `uid`, `donator_mail`, `adopted_username`,`name`, `age`, `health`, `type`, `gender`, `picture`, `location`) VALUES (NULL, '$uid', '$donator_mail', '$username', '$name', '$age', '$health', '$type', '$gender', '$picture', '$location')";
    		$adopted_query_result = mysqli_query($conn, $adopted_query);


    		$delete_query = "DELETE FROM animal WHERE `animal`.`uid` = '$uid'";
    		$delete_query_result = mysqli_query($conn, $delete_query);

    		if ($adopted_query_result && $delete_query_result) {
    			$_SESSION['adopt_success'] = true;
    			header("Location: ../views/adopt.php");
    			die();
    		}else{
    			$_SESSION['adopt_false'] = true;
    			header("Location: ../views/adopt.php");
    			die();
    		}
    	}else{
    		$_SESSION['no_data_error'] = true;
    		header("Location: ../views/adopt.php");
    		die();
    	}
    }else{
    	header("Location: ../views/adopt.php");
    	die();
    }
?>