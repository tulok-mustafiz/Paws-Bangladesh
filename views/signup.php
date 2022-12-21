<!doctype html>
<html lang="en">
  <head>
    <title>Signup</title>
  </head>
  <body>
    <?php require '_nav.php' ?>
    <?php include("../controllers/signup.php");?>
    <div class="container my-4">
     <h1 class="text-center"> Signup Here</h1>
     <form action="../controllers/signup.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Full Name</label>
            <input type="text" maxlength="100" class="form-control" id="username" name="username" placeholder="Your Name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Home Address</label>
            <input type="text" maxlength="100" class="form-control" id="address" name="address" placeholder="Your Home Address" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" maxlength="11" class="form-control" id="phone" name="phone" placeholder="11 Digit Mobile Number" pattern="[0-9]{11}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" maxlength="100" class="form-control" id="email" name="email" placeholder="Your Email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" maxlength="23" class="form-control" id="password" name="password" placeholder="Your Password">
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" maxlength="23" class="form-control" id="cpassword" name="cpassword" placeholder="Retype Password from Above">
            <div id="emailHelp" class="form-text">Make sure to type the same password.</div>
        </div>
        <button type="submit" class="btn btn-primary">SignUp</button>
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