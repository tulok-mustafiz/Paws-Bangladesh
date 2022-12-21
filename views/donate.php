<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
$showError = false;
$showAlert = false;
include "../controllers/donate.php";
?>
<!doctype html>
<html lang="en">
  <head>

    <title>Donate</title>
  </head>
  <body>
    <?php require '_nav.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your animal details is now posted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="container my-4">
     <h1 class="text-center"> Give Animal Details</h1>
     <form action="donate.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" maxlength="100" class="form-control" id="name" name="name" placeholder="Your Animal Name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Breed</label>
            <input type="text" maxlength="100" class="form-control" id="description" name="description" placeholder="animal breed" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status">
                <option value="available">Available</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Animal Status" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="text" maxlength="2" class="form-control" id="age" name="age" placeholder="Your Animal Age" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="health" class="form-label">Health Issues</label>
            <input type="text" maxlength="100" class="form-control" id="health" name="health" placeholder="Any Health Issues of your Animal" >

        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" maxlength="100" class="form-control" id="type" name="type" placeholder="Type of your Animal Ex:Cat/Dog" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender">
                <option value=""> Choose Gender </option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
<div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" maxlength="5" class="form-control" id="price" name="price" placeholder="Animal Price" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="picture" class="form-label">picture</label>
            <input type="picture" class="form-control" id="picture" name="picture" placeholder="Image Link">
            
        </div>
        <button type="submit" class="btn btn-primary">ADD ANIMAL</button>
     </form> 
    </div>
  


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