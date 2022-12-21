<!DOCTYPE html>
<html lang="en">
<head>

<?php 
session_start(); 
require '_nav.php'; 
include '_dbconnect.php';

if (isset($_POST['add_to_card'])) {


	$user_email = $_SESSION['email'];

	$query = "SELECT * FROM `users` WHERE `mail` = '$user_email'";
	$result = mysqli_query($conn, $query);

	$row = mysqli_num_rows($result);

	if($row == 1){
		$data = mysqli_fetch_assoc($result);
	}

	$pd_uid = $_POST['pd_uid'];
	$pd_name = $_POST['pd_name'];
	$pd_des = $_POST['pd_des'];
	$pd_price = $_POST['pd_price'];
	$pd_type = $_POST['pd_type'];
	$pd_batch = $_POST['pd_batch'];
	$pd_expire_date = $_POST['pd_expire_date'];
	$pd_quantity = 1;

	$buyer_name = $data['username'];
	$buyer_email = $data['mail'];

	$cart_insert_query = "INSERT INTO `cart` (`id`, `pd_uid`, `pd_name`, `pd_type`, `pd_description`, `pd_expire_date`, `pd_batch_no`, `pd_price`, `pd_quantity`, `buyer_name`, `buyer_email`,`status`, `checkout`) VALUES (NULL, '$pd_uid', '$pd_name', '$pd_type', '$pd_des', '$pd_expire_date', '$pd_batch', '$pd_price', '$pd_quantity', '$buyer_name', '$buyer_email','pending','0')";

	$cart_insert_result = mysqli_query($conn, $cart_insert_query);

    header("location: cart.php");
	

}


?>

</head><!--/head-->
<body>



            <div class="col-md-12" style="background-color:#fff; border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px; height:700px;">
            

    
        <div class="panel panel-primary">
            <div class="panel-heading panel-title text-center wow fadeInDown">
                <span style="font-weight:bold; font-family:verdana;"><i class="glyphicon glyphicon-list-alt"></i> Product List</span>
            </div>

            <center>
                <form action="" method="POST">
                     <select name="query">
                        <option>Select</option>         
                        <option value="medicine">Medicine</option>
                        <option value="food">Food</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </form>
            </center>

            <div class="panel-body" style="background-color:#fff;">
                 <!--   Basic Table  -->
              <table class="table table-responsive table-hover table-bordered table-condensed table-striped wow fadeInDown" width="100%">
              	<thead>
                	<tr style="background-color:#000; color:#FFF;">
                    	<td style="text-align:center; width:auto;" class="wow fadeInDown">NAME</td>
                        <td style="text-align:center; width:auto;" class="wow fadeInDown">DESCRIPTION</td>
                        <td style="text-align:center; width:auto;" class="wow fadeInDown">PRICE</td>
                        <td style="text-align:center; width:auto;" class="wow fadeInDown">STATUS</td>
                        <td style="text-align:center; width:auto;" class="wow fadeInDown">IMAGE</td>
                        <td style="text-align:center; width:auto;" class="wow fadeInDown">ACTION</td>
                        
                    </tr>
                    <tbody>
                    <?php 
                    include('includes/dbconn.php');
					$id = 0;
                    $name = "";
                    $des = "";
                    $price = "";
                    $stat = "";
                    $image = "";

                    if (isset($_POST['submit'])) {
                        $type = $_POST['query'];

                        if ($type == "food" || $type == "medicine") {
                            $sql = ("SELECT *  FROM $type");
                            $result=mysqli_query($con, $sql);

                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $name = $type . "_name";
                                    $des = $type . "_description";
                                    $price = $type . "_price";
                                    $stat = $type . "_status";
                                    $expire_date = $type . "_expire_date";
                                    $batch = $type . "_batch_no";


                                    $id = $row['id'];
                                    $uid = $row['uid'];
                                    $name = $row[$name];
                                    $des = $row[$des];
                                    $expire_date = $row[$expire_date];
                                    $batch = $row[$batch];
                                    $price = $row[$price];
                                    $stat = $row['status'];
                                    $image = $row['image'];

                        
                    ?>

                    	<tr style="font-size:16px; cursor:pointer;">
                        	<td class="wow fadeInDown"> <center><strong><?php echo $name;?></strong></center></td>
                            <td class="wow fadeInDown"> <center><strong><?php echo $des;?></strong></center></td>
                            <td class="wow fadeInDown"> <center><strong><?php echo $price;?></strong></center></td>
                            <td class="wow fadeInDown"> <center><strong><?php echo $stat;?></strong></center></td>

                            <td class="wow fadeInDown"> <center><img src="<?php echo $image;?>" width="100px;" class="img-responsive img-rounded" /></center></td>

                            <td class="wow fadeInDown"><center>
                            	<form action="" method="POST">
                            		<input type="hidden" name="pd_uid" value="<?php echo $uid?>">
                            		<input type="hidden" name="pd_name" value="<?php echo $name?>">
                            		<input type="hidden" name="pd_des" value="<?php echo $des?>">
                            		<input type="hidden" name="pd_price" value="<?php echo $price?>">
                            		<input type="hidden" name="pd_batch" value="<?php echo $batch?>">
                            		<input type="hidden" name="pd_expire_date" value="<?php echo $expire_date?>">
                            		<input type="hidden" name="pd_type" value="<?php echo $type?>">
                            		<input type="submit" name="add_to_card" value="Add to Cart" class="btn btn-primary">
                            	</form>
                            </center></td>
                        </tr>
                        <?php }}}}?>
                    </tbody>
                </thead>
              
              </table>
                  <!-- End  Basic Table  -->
       
        </div>
    </div>
</div> 


<br>
<!--*************************************************** FOOTERS **********************************************-->
  
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <center>&copy; 2019 <a target="_blank" href="#" title="#">Petshop Online Website</a>. All Rights Reserved.</center>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

</script>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>