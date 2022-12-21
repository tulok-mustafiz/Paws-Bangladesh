<?php
$showError = false;
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "../model/_dbconnect.php";
    $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
   
    //$sql = "Select * from users where email='$email' AND password='$password'";
    $sql = "Select * from users where mail='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header("location: ../views/welcome.php");
            }
            else{
                $showError= "Invalid Credentials";
            }

        }
        
        
    }
    
    else{
        $showError= "Invalid Credentials";
    }

}
?>