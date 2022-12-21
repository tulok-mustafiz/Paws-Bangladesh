<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin = false;
}

echo '
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--    <link href="images/logo.jpg" rel="shortcut icon"> -->
    <title>Petshop Online Website</title>
  
  <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

</head><!--/head-->
<nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                     <a href="index.php"><h4 class="wow fadeInDown" style="margin-top:20px; color:#FFF;"> 
                <!--      <img src="images/logo.jpg"  width="15% "/> --> Paws Bangladesh </h4></a>
                                    <a href="index.php"><h4 class="wow fadeInDown" style="margin-top:20px; color:#FFF;"> 
                <!--      <img src="images/logo.jpg"  width="15% "/> --> Online Pet Shop Management System </h4></a>

                </div>
    
                <div class="collapse navbar-collapse navbar-right wow fadeInDown">
                    <ul class="nav navbar-nav">
                         <li class="active"><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                         <li ><a href="profile.php">Profile</a></li>
                        
                        <li ><a href="available.php">Available Pets</a></li>
                        <li ><a href="donate.php">Donate Pets</a></li>
                        <li ><a href="store.php">Medicine & Food Store</a></li>
                        <li ><a href="cart.php">My Cart</a></li>
                        <li><a href="contacts.php">Contacts</a></li>
                        <li ><a href="about-us.php">About Us</a></li>
                        
                        
                        '
                        ;


                        if(!$loggedin){

                          echo '
                            <li><a href="login.php">Login</a></li>
                            <li><a href="signup.php">Signup</a></li>
                          ';
                        }else{
                          echo '<li><a href="../controllers/logout.php">Logout</a></li>';
                        }
                                                               
                    echo '</ul>
                </div>
            </div><!--/.container-->
        </nav>';