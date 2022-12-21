<?php include("../controllers/cart.php");?>


<!doctype html>
<html lang="en">
  <head>
    <title>Profile</title>
  </head>
  <body>

  	<div class="container">
  		<div class="row justify-content-center">
  			<div class="col-8"><br><br>

  				<h2 class="text-center text-primary">CheckOut</h2>

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
				    </tr>
				  </thead>
				  <tbody>
				      <?php
				      $count = 1;
				      	while ($row = mysqli_fetch_assoc($cart_query_reault)) {

				      		$uid = $row['pd_uid'];
				      		$pd_price = $row['pd_price'];

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
				      		$count++;
				      	}
				      ?>
				  </tbody>
				</table>

				<br>
  			</div>
  		</div>
  		 <div class="row">
  		 	<div class="col-3">
  		 		<form action="../controllers/place_order.php" method="POST">
					<input type="number" name="card_number" placeholder="Card Number" class="form-control" required><br>
					<input type="text" name="price" value="<?php echo $pd_price;?>" readonly class="form-control">
					<input type="hidden" name="uid" value="<?php echo $uid?>" required>

					<input type="submit" name="checkout_submit" value="CheckOut" class="btn btn-primary">
			</form>
  		 	</div>
  		</div>
  	</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>






 ?>