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

	if($row == 1){
		$data = mysqli_fetch_assoc($result);
	}

	$cart_query = "SELECT * FROM `cart` WHERE `status` = 'pending' AND `buyer_email` = '$user_email'";
	$cart_query_reault = mysqli_query($conn, $cart_query);

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
				  <!--
				  <div class="card-body">
				    <h5 class="card-title">Welcome <?php echo $data['username'];?></h5>
				    <p class="card-text">
				    	<?php
				    		echo "Username : " . $data['username'] . "<br>";
				    		echo "Email : " . $data['mail'] . "<br>";
				    		echo "Phone : " . $data['phone'] . "<br>";
				    		echo "Address : " . $data['address'] . "<br>";
				    	?>
				    </p>
				  </div> -->
				</div>
  			</div>

  			<div class="col-8"><br><br>

  				<h2 class="text-center text-primary">Product Cart</h2>

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
				      <th scope="col">Quantity</th>
				      <th scope="col">Buyer Name</th>
				      <th scope="col">Buyer Mail</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				      <?php
				      $count = 1;
				      	while ($row = mysqli_fetch_assoc($cart_query_reault)) {

				      		$uid = $row['pd_uid'];

				      		echo "<tr><td>" . $count . "</td>";
				      		echo "<td>" . $row['pd_name'] . "</td>";
				      		echo "<td>" . $row['pd_description'] . "</td>";
				      		echo "<td>" . $row['pd_type'] . "</td>";
				      		echo "<td>" . $row['pd_expire_date'] . "</td>";
				      		echo "<td>" . $row['pd_batch_no'] . "</td>";
				      		echo "<td>" . $row['pd_price'] . "</td>";
				      		echo "<td>" . $row['pd_quantity'] . "</td>";
				      		echo "<td>" . $row['buyer_name'] . "</td>";
				      		echo "<td>" . $row['buyer_email'] . "</td>";
				      		echo "<td class='btn btn-danger'>" . $row['status'] . "</td>";

				      		if ($row['checkout'] == 0) {
				      			echo "<td>
				      			<form action='checkout.php' method='POST'>
				      			<input type='hidden' name='pd_uid' value=$uid>
				      				<input type='submit' name='checkout' value='CheckOut' class='btn btn-primary'>
				      			</form>
				      			</td>";
				      		}
				      		
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



