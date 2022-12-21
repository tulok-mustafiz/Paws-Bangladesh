

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
                        $_SESSION['prod_type'] = $type;

                        if ($type == "food" || $type == "medicine") {
                            $sql = ("SELECT *  FROM `$type` order by id DESC") or die (mysqli_error());
                            $result=mysqli_query($con, $sql);
                            //print_r (mysqli_fetch_assoc($result));die();
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $name = $type . "_name";
                                    $des = $type . "_description";
                                    $price = $type . "_price";
                                    $stat = $type . "_status";

                                    $id = $row['id'];
                                    $name = $row[$name];
                                    $des = $row[$des];
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
                            <td class="wow fadeInDown"><center><a href="#updateModal<?php echo $id;?>" data-toggle="modal" data-target="#updateModal<?php echo $id;?>" class="btn btn-default">Update</a> | <a href="#deleteModal<?php echo $id;?>" data-toggle="modal" data-target="#deleteModal<?php echo $id;?>" class="btn btn-danger"> Delete</a></center></td>
                        </tr>
                       <?php include('updateModal.php')?>
                       <?php include('deleteModal.php')?>
                        <?php }}}}?>
                    </tbody>
                </thead>
              
              </table>
                  <!-- End  Basic Table  -->
       
        </div>
    </div>
</div> 
