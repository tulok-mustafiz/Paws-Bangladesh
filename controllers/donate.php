<?php
include '../model/_dbconnect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    include '_dbconnect.php';
    $donator=$_SESSION['email'];
    $uid = rand();
    $name = $_POST["name"];
    $description = $_POST["description"];
    $status = $_POST["status"];
    $location = $_POST["location"];
    $price = $_POST["price"];
    $age = $_POST["age"];
    $health = $_POST["health"];
    $type = $_POST["type"];
    $gender = $_POST["gender"];
    $picture = $_POST["picture"];
    
    $sql ="INSERT INTO `animal` (`id`, `uid`, `description`, `donator_mail`, `name`, `age`, `health`, `type`, `gender`, `status`, `picture`, `price`, `location`) VALUES (NULL, '$uid', '$description', '$donator', '$name', '$age', '$health', '$type', '$gender', '$status', '$picture', '$price', '$location')";
    $result = mysqli_query($conn, $sql);
    // $sql1="INSERT INTO `donater` (`email`) VALUES ('$donator')";
    // $result = mysqli_query($conn, $sql1);       
    $showAlert = true;      
}
?>