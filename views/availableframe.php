

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/foods/logo.png" rel="shortcut icon">
    <title>Petshop Online Website</title>
  
  <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">


<style type="text/css">
  input#order_btn {
    margin-top: 25px;
}
</style>
</head>
<!--*********************************************START OF NAVIGATION BAR****************************************--> 
      
      
              <table class="table table-responsive table-hover" style="border: 1px dashed #8c8b8b;
                border-top: 1px dashed #8c8b8b;">


         <?php 
         include('includes/dbconn.php');
        $count = 0;
        $id = 0;
        $donator_mail = "";
        $sql = "SELECT * FROM animal WHERE status = 'available' order by id desc" or die (mysqli_error($con));
        
        $result=mysqli_query($con, $sql) or die (mysqli_error($con));
        
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $donator_mail = $row['donator_mail'];
            $count++;
        ?>

                  <tr style="border: 1px dashed #8c8b8b; cursor:pointer;">
                    <td  style="border: 1px dashed #8c8b8b;"><center><strong class="wow fadeInDown"><p style="margin-top:25px;">No.<?php echo $count;?></p></strong></center></td>
                      <td style="border: 1px dashed #8c8b8b;"><center><img src="<?php echo $row['picture']?>" width="120px;" class="img-responsive img-rounded wow fadeInDown"></center></td>
                        <td style="border: 1px dashed #8c8b8b;"> 
                        <dl class="dl-horizontal wow fadeInDown" style="text-align:left">
                        <dt>Name:</dt> <dd><?php echo $row['name'];?></dd>
                        <dt>Description:</dt> <dd><?php echo $row['description'];?></dd>
                        <dt>Health:</dt> <dd><?php echo $row['health'];?></dd>
                        <dt>Age:</dt> <dd><?php echo $row['age'];?> years</dd>
                        <dt>Type:</dt> <dd><?php echo $row['type'];?></dd>
                       <dt>Price:</dt> <dd><?php echo $row['price'];?></dd>
                       <dt>Location:</dt> <dd><?php echo $row['location'];?></dd>
                        </dl></td>
                        <td style="border: 1px dashed #8c8b8b;">
                          <center>
                          <form method="POST">
                            <input class="btn btn-success wow fadeInDown" name="order_btn" id="order_btn" type="submit" value='Adopt'>
                            <input type="hidden" name="pet_uid" value="<?php echo $row['uid']?>">
                            </td>
                          </form>
                          </center>                
                    </tr>
 <?php }}

 else {echo '<strong style="color:red">No available animals.</strong>'; } 

  if (isset($_POST['order_btn'])) {
      $pet_uid = $_POST['pet_uid'];
      $user_email = $_SESSION['email'];

      if($donator_mail != $user_email){
        $query = "SELECT * FROM `users` WHERE `mail` = '$user_email'";
        $result = mysqli_query($con, $query);

        $row = mysqli_num_rows($result);

        if($row == 1){
          $data = mysqli_fetch_assoc($result);

          $username = $data['username'];
          $phone = $data['phone'];
          $user_email = $data['mail'];
          $address = $data['address'];

          $pet_query = "SELECT * FROM animal WHERE uid = '$pet_uid'" or die (mysqli_error($con));
        
          $pet_result=mysqli_query($con, $pet_query) or die (mysqli_error($con));

          $pet_data = mysqli_fetch_assoc($pet_result);

          $pet_name = $pet_data['name'];
          $pet_description = $pet_data['description'];
          $pet_age = $pet_data['age'];
          $pet_health = $pet_data['health'];
          $pet_type = $pet_data['type'];
          $pet_gender = $pet_data['gender'];
          $pet_donator_mail = $pet_data['donator_mail'];
          $pet_adopted_by = $user_email;
          $pet_picture = $pet_data['picture'];
          $pet_location = $pet_data['location'];
          $pet_description = $pet_data['description'];

          $pet_insert_query = "INSERT INTO `adopted` (`id`, `uid`, `donator_mail`, `adopted_username`, `adopted_mail`, `name`, `description`, `age`, `health`, `type`, `gender`, `picture`, `location`) VALUES (NULL, '$pet_uid', '$pet_donator_mail', '$username', '$pet_adopted_by', '$pet_name', '$pet_description', '$pet_age', '$pet_health', '$pet_type', '$pet_gender', '$pet_picture', '$pet_location')";
          $pet_insert_result = mysqli_query($con, $pet_insert_query);

          $pet_delete_query = "DELETE FROM animal WHERE `uid` = '$pet_uid'";
          $pet_delete_result = mysqli_query($con,$pet_delete_query);

          echo "<script> window.location.href='profile.php'</script>";
                    
        }
      }else{
        echo "<script>alert('You can not buy your own donated animal.')</script>";
      }

    }


 ?>

</table>