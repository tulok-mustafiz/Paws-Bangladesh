<div class="container wow fadeInDown" style=" height:500px;">
    <div class="col-md-12" style="border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px;">
        <div class="panel panel-success">
            <div class="panel-heading panel-title" >
                <span style="font-weight:bold; font-family:verdana;"><i class="glyphicon glyphicon-cog"></i> Product </span>
            </div>
            <div class="panel-body" style="background-color:#fff;">

 			
            <div class="col-lg-3">
            <em style="color:red;">Note: Fields with (*) are required</em></div>
            <div class="col-lg-6">
            	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                	<table>

                    	<tr>
                        	<td style="text-align:right; font-weight:bold;">Product name* : &emsp;</td>
                            <td style="text-align:center;">&emsp; <textarea class="form-control" name="pd_name" required></textarea></td>
                        </tr>

                        <tr>
                            <td style="text-align:right;font-weight:bold;">Product Type* : &emsp;</td>
                            <td style="text-align:center;">&emsp; <select name="pd_type" class="form-control">
                                    <option>Select</option>
                                    <option value="medicine">Medicine</option>
                                    <option value="food">Food</option>
                            </select></td>
                        </tr>

                        <tr>
                            <td style="text-align:right;font-weight:bold;">Batch* : &emsp;</td>
                            <td style="text-align:center;">&emsp; <input type="text" name="pd_batch" class="form-control" required /></td>
                        </tr>

                        <tr>
                            <td style="text-align:right;font-weight:bold;">Expire Date* : &emsp;</td>
                            <td style="text-align:center;">&emsp; <input type="date" name="pd_expire_date" class="form-control" required /></td>
                        </tr>

                        <tr>
                        	<td style="text-align:right;font-weight:bold;">Amount(Pesos.)* : &emsp;</td>
                            <td style="text-align:center;">&emsp; <input type="number" step="any" class="form-control" name="pd_price" placeholder="0.00" required /></td>
                        </tr>

                        <tr>
                        	<td style="text-align:right;font-weight:bold;">Description* : &emsp;</td>
                            <td style="text-align:center;">&emsp; <textarea class="form-control" name="pd_des" required></textarea></td>
                        </tr>
                         <tr>
                        	<td style="text-align:right;font-weight:bold;">Image* : &emsp;</td>
                            <td style="text-align:center;">&emsp; <input type="text" name="pd_image" class="form-control" required /></td>
                        </tr>
                         <tr>
                        	<td style="text-align:right;font-weight:bold;">Status* : &emsp;</td>
                            <td style="text-align:center;">&emsp; <select name="pd_status" class="form-control">
                            		<option>Select</option>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Un-Available</option>
                            </select></td>
                        </tr>
                         <tr style="margin-top:20px;">
                        	<td style="text-align:right;font-weight:bold;" colspan="2"><br /><p></p>
                            <button class="btn btn-default" type="clear">Clear</button>
                            <button class="btn btn-success" type="submit" name="save">Save</button></td>
                            
                        </tr>
                    
                    </table>
                </form>
            </div>
            <div class="col-lg-3"></div>

            </div>
        </div>
    </div>
</div>
<?php 
include('includes/dbconn.php');
if(isset($_POST['save'])){
			$pd_name = $_POST['pd_name'];
            $pd_type = $_POST['pd_type'];
            $pd_batch = $_POST['pd_batch'];
            $pd_expire_date = $_POST['pd_expire_date'];
			$pd_price = $_POST['pd_price'];
			$pd_des = $_POST['pd_des'];
			$pd_status = $_POST['pd_status'];
            $pd_img = $_POST['pd_image'];

			if(empty($pd_name) || empty($pd_type) || empty($pd_batch) || empty($pd_expire_date) || empty($pd_price) || empty($pd_des) || empty($pd_status) || empty($pd_img)){
					echo '<script>alert("Fields must be empty.");
								 window.location.href="addcnp.php";
					</script>';
				
				}else {
                    $uid = rand();
                    $pd_category = "store";
                    if ($pd_type == "medicine") {
                        $med_sql = "INSERT INTO `medicine` (`id`, `uid`, `medicine_name`, `medicine_type`, `medicine_batch_no`, `medicine_expire_date`, `medicine_description`, `medicine_price`, `category`, `status`, `image`) VALUES (NULL, '$uid', '$pd_name', '$pd_type', '$pd_batch', '$pd_expire_date', '$pd_des', '$pd_price', '$pd_category', '$pd_status', '$pd_img')";

                        $result=mysqli_query($con, $med_sql);
                    }
                    elseif ($pd_type == "food") {
                            
                        $food_sql = "INSERT INTO `food` (`id`, `uid`, `food_name`, `food_type`, `food_description`, `food_expire_date`, `food_batch_no`, `food_price`, `category`, `status`, `image`) VALUES (NULL, '$uid', '$pd_name', '$pd_type', '$pd_des', '$pd_expire_date', '$pd_batch', '$pd_price', '$pd_category', '$pd_status', '$pd_img')";
                        $result = mysqli_query($con, $food_sql);

                    }else{
                        echo "Error";
                        die();
                    }
					
						
					}
		}
?>