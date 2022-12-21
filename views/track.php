<?php

session_start();
    $animal_query_result = "";

    if (isset($_POST['name'])) {
    	$animal_name = $_POST['name'];
        $animal_name = filter_var($animal_name, FILTER_SANITIZE_STRING);

    	require '_dbconnect.php';

        $animal_query = "SELECT * FROM `adopted` WHERE `name`='$animal_name'";
        $animal_query_result = mysqli_query($conn, $animal_query);
        $row_count = mysqli_num_rows($animal_query_result);
        if($row_count == 0){
            $_SESSION['no_animal_data'] = true;;
        }

    }


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Tracking</title>
  </head>
  <body>
    <?php require '_nav.php' ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <form action="" method="POST">
                    <input type="text" name="name" class="form-control"><br>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </form>
            </div><hr>
        </div>
            <div class="row">
                <table class="table mt-3">

                  
                      <?php
                      if(isset($_SESSION['no_animal_data'])){
                        echo '<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                              No Data Found.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>';
                      }else{
                      if ($animal_query_result != "") {
                        echo '<thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Age</th>
                      <th scope="col">Health</th>
                      <th scope="col">Type</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Donator Mail</th>
                      <th scope="col">Adopted By</th>
                      <th scope="col">Picture</th>
                      <th scope="col">Location</th>
                    </tr>
                  </thead>
                  <tbody>';
                          $count = 1;
                        while ($row = mysqli_fetch_assoc($animal_query_result)) {
                            echo "<tr><td>" . $count . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['age'] . "</td>";
                            echo "<td>" . $row['health'] . "</td>";
                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . $row['donator_mail'] . "</td>";
                            echo "<td>" . $row['adopted_username'] . "</td>";
                            echo "<td>" . $row['picture'] . "</td>";
                            echo "<td>" . $row['location'] . "</td></tr>";
                            $count++;
                        }
                      }
                  }
                      
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  </body>
</html>



<?php unset($_SESSION['no_animal_data']);?>