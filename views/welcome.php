<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>

    <title>Online Pet Shop | Welcome</title>
  </head>
  <body>
  
    <?php require '_nav.php' ?>
    Welcome <?php echo $_SESSION['email']?>
    <style type="text/css">
      {
        width:350px;
        height:350px;
        background-image:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFeqY4PySIsjA_vy8D88oAEczH9OjU3wQN1g&usqp=CAU), url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXCot-C2IGYXSkyTbUxoUlX6_NhLK1WNdnY6m3CZ_hHfAhUSmlioThCMbF3BsrfRzwJFc&usqp=CAU), url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQy30EaLX4suSQJo9MmMyOZKayOkgnQkIUFbg&usqp=CAU),url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGZanKrfxF4BGlQq_Xe0SgP98qW29vJ976IA&usqp=CAU);
        background-position:left top, right top, left bottom, right bottom;
        background-repeat:no-repeat,no-repeat,no-repeat,no-repeat;
      }
</style>
<!--
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
        </tr> -->
<!--

//    <?php 
//    include '_dbconnect.php';
//    $sql = "SELECT * FROM `users`";
//    $result=$conn-> query($sql);
//    if($result-> num_rows >0){
//        while($row= $result-> fetch_assoc()){
//            echo "<tr><td>". $row["id"] ."</td><td>". $row["username"] ."</td><td>". $row["address"] ."</td><td>". $row["phone"] ."</td><td>". $row["email"] ."</td><tr>";
//        }
//        echo "</table>";
//    }
//    else{
//        echo "0 result";
//   }
    
//    ?>
    </table>

-->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>