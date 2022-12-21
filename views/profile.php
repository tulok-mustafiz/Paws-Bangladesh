<?php
	session_start();

	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    die();
}

require '_nav.php';

include '_dbconnect.php';
	$user_email = $_SESSION['email'];

	$query = "SELECT * FROM `users` WHERE `mail` = '$user_email'";
	$result = mysqli_query($conn, $query);


	$row = mysqli_num_rows($result);
	$username = "";
	$mail = "";
	$phone = "";
	$address = "";

	if ($row == 1) {
		$data = mysqli_fetch_assoc($result);
		$username = $data['username'];
		$mail = $data['mail'];
		$phone = $data['phone'];
		$address = $data['address'];
	}

	$adopted_animal_query = "SELECT * FROM `adopted` WHERE `adopted_username`= '$username'";
	$adopted_animal_query_result = mysqli_query($conn, $adopted_animal_query);

	$cart_query = "SELECT * FROM `cart` WHERE `status` = 'approved'";
	$cart_query_result = mysqli_query($conn, $cart_query);
	//$cart_data = mysqli_fetch_assoc($cart_query_result);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Profile</title>
  </head>
  <body>

  	<div class="container">
  		<div class="row justify-content-center">
  			<div class="col-3">
  				<div class="card text-center p-5">
				  <img src="https://media.istockphoto.com/vectors/user-member-vector-icon-for-ui-user-interface-or-profile-face-avatar-vector-id1130884625?k=20&m=1130884625&s=612x612&w=0&h=OITK5Otm_lRj7Cx8mBhm7NtLTEHvp6v3XnZFLZmuB9o=" class="card-img-top" alt="Profile Picture" style="width: 250px;">
				  <div class="card-body">
				    <h5 class="card-title">Welcome <?php echo $username;?></h5>
				    <p class="card-text">
				    	<?php				    	
				    		echo "Username : " . $username . "<br>";
				    		echo "Email : " . $mail . "<br>";
				    		echo "Phone : " . $phone . "<br>";
				    		echo "Address : " . $address . "<br>";
				    	?>
				    </p>
				  </div>
				</div>
  			</div>

  			<div class="col-8">

  				<h2>Adopted Animals</h2>

  				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Description</th>
				      <th scope="col">Age</th>
				      <th scope="col">Health</th>
				      <th scope="col">Type</th>
				      <th scope="col">Gender</th>
				      <th scope="col">Donator Mail</th>
				      <th scope="col">Adobted By</th>
				      <th scope="col">Picture</th>
				      <th scope="col">Location</th>
				    </tr>
				  </thead>
				  <tbody>
				      <?php
				      $count = 1;
				      	while ($row = mysqli_fetch_assoc($adopted_animal_query_result)) {
				      		echo "<tr><td>" . $count . "</td>";
				      		echo "<td>" . $row['name'] . "</td>";
				      		echo "<td>" . $row['description'] . "</td>";
				      		echo "<td>" . $row['age'] . "</td>";
				      		echo "<td>" . $row['health'] . "</td>";
				      		echo "<td>" . $row['type'] . "</td>";
				      		echo "<td>" . $row['gender'] . "</td>";
				      		echo "<td>" . $row['donator_mail'] . "</td>";
				      		echo "<td>" . $row['adopted_username'] . "</td>";
				      		echo "<td>" . $row['picture'] . "</td>";
				      		echo "<td>" . $data['address'] . "</td></tr>";
				      		$count++;
				      	}
				      ?>
				  </tbody>
				</table>
  			</div>

  		</div>

  		<div class="row">
  			<div class="col justify-content-center">
  				<h2>Products & Medicines</h2>

  				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Description</th>
				      <th scope="col">Type</th>
				      <th scope="col">Expire Date</th>
				      <th scope="col">Batch No</th>
				      <th scope="col">Price</th>
				      <th scope="col">Status</th>
				    </tr>
				  </thead>
				  <tbody>
				      <?php
				      $count = 1;
				      	while ($cart_data = mysqli_fetch_assoc($cart_query_result)) {
				      		echo "<tr><td>" . $count . "</td>";
				      		echo "<td>" . $cart_data['pd_name'] . "</td>";
				      		echo "<td>" . $cart_data['pd_description'] . "</td>";
				      		echo "<td>" . $cart_data['pd_type'] . "</td>";
				      		echo "<td>" . $cart_data['pd_expire_date'] . "</td>";
				      		echo "<td>" . $cart_data['pd_batch_no'] . "</td>";
				      		echo "<td>" . $cart_data['pd_price'] . "</td>";
				      		echo "<td class='btn btn-success' disabled>" . $cart_data['status'] . "</td>";
				      		$count++;
				      	}
				      ?>
				  </tbody>
				</table>
  			</div>
  		</div>
  	</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>



