<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    die();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Table with database</title>
  </head>
  <body>
    <?php require '_nav.php' ?>
    <div class="row p-5">

    <!-- ALERTS STARTS-->
        <?php
            if (isset($_SESSION['adopt_success'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      Animal Aduption Successfull.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
            }elseif (isset($_SESSION['adopt_false'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Animal Aduption Unsuccessfull.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
            }elseif (isset($_SESSION['no_data_error'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      No Animal Found.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
            }
        ?>
    <!-- ALERTS ENDS-->

    <table class="table table-stripped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Health</th>
            <th>Type</th>
            <th>Gender</th>
            <th>Picture</th>
            <th colspan="2">Action</th>
        </tr>
    <?php 
        include '_dbconnect.php';
        $sql = "SELECT * FROM `animal`";
        $result=$conn-> query($sql);
        
        if($result-> num_rows > 0){
            $count = 1;
            while($row= $result-> fetch_assoc()){
                echo "<tr>
                    <td>". $count ."</td>
                    <td>". $row["name"] ."</td>
                    <td>". $row["age"] ."</td>
                    <td>". $row["health"] ."</td>
                    <td>". $row["type"] . "</td>
                    <td>". $row["gender"] . "</td>
                    <td>". $row["picture"] . "</td>
                    <td><a class='btn btn-primary' href='../controllers/action.php?uid=" . $row['uid'] . "'>Adopt</a></td>
                <tr>";
                $count++; 
            }
            echo "</table>";
        }
        else{
            // echo "0 result";
        }
        
        ?>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
  </body>
</html>

<?php 
    unset($_SESSION['adopt_success']);
    unset($_SESSION['adopt_false']);
    unset($_SESSION['no_data_error']);
?>

