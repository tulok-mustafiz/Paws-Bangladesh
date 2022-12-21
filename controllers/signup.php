<?php
$showError = false;
$showAlert = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    include "../model/_dbconnect.php";
    $username = $_POST["username"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists=false;
    $existsql = "SELECT * FROM `users` WHERE mail = '$email'";
    $result = mysqli_query($conn, $existsql);
    $numExistRows = mysqli_num_rows($result);

    if($numExistRows > 0){
        $showError= "Email Already Exists";
        $exists = true;
        header("Location: ../views/signup.php");
    }
    else{
        if(($password == $cpassword) && $exists==false){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql ="INSERT INTO `users` (`id`,`username`, `address`, `phone`, `mail`, `password`) VALUES (NULL,'$username', '$address', '$phone', '$email', '$hash')";
            $result = mysqli_query($conn, $sql);
            
            if ($result){ 
                $showAlert = true;
                header("Location: ../views/login.php");
                
            }
        }
        else{
            $showError = true;
            $showError= "Password do not match";
            
        }

    }   
}
?>