<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  
error_reporting(0);  
session_start(); 

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="homepage.png">
    <title>Food Ordering Website CT LAB</title>
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
   
    <link href="css/style.css" rel="stylesheet"> </head>

<body class="home">
    
        
        <header id="header" class="header-scroll top-header headrom">
           
            <nav class="navbar navbar-dark">
            <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">☰</button>
                    <a class="navbar-brand" href="home.php"> <img class="img-rounded" src="images\logo.png" alt="" height="55"> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><br> <a class="nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <br> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            
                           
							<?php
						if(empty($_SESSION["user_id"])) 
							{
								echo '<li class="nav-item"><br> <a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><br> <a href="registration.php" class="nav-link active">Sign Up</a> </li>';
							}
						else
							{
								
									
									echo  '<li class="nav-item"><br> <a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
									echo  '<li class="nav-item"><br> <a href="logout.php" class="nav-link active">Logout</a> </li>';
							}

						?>
							 
                        </ul>
						 
                    </div>
                </div>
            </nav>
            
        </header>
        
        <section class="hero bg-image" data-image-src="images/img/main.gif">
            <div class="hero-inner">
                <div class="container text-center hero-text font-white">
                    <h1>Delicious Food Delivered At Your Place </h1>
                    <h5 class="font-white space-xs">Find The hotels and Cloud Kitchens near you</h5>
                    <div class="banner-form">
                        <form class="form-inline">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">I would like to eat....</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputAmount" placeholder="I would like to eat...."> </div>
                            </div>
                            <button onclick="location.href='restaurants.php'" type="button" class="btn theme-btn btn-lg">Search dishes</button>
                        </form>
                    </div>
                            
                    
                </div>
            </div>
          
        </section>
        
      
        <section class="popular">
            <div class="container">
                <div class="title text-xs-center m-b-30">
                    <h2>Popular Dishes of this Week</h2>
                    <p class="lead">We’ve got something for everyone :)</p>
                </div>
                <div class="row">
				
				
				
						<?php 
						
						$query_res= mysqli_query($db,"select * from dishes LIMIT 3"); 
									      while($r=mysqli_fetch_array($query_res))
										  {
													
						                       echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
														<div class="food-item-wrap">
															<div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/'.$r['img'].'">
																<div class="distance"><i class="fa fa-pin"></i>3-8 km</div>
																<div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
																<div class="review pull-right"><a href="#">198 reviews</a> </div>
															</div>
															<div class="content">
																<h5><a href="dishes.php?res_id='.$r['rs_id'].'">'.$r['title'].'</a></h5>
																<div class="product-name">'.$r['slogan'].'</div>
																<div class="price-btn-block"> <a href="dishes.php?res_id='.$r['rs_id'].'" class="btn theme-btn-dash pull-right">Order Now</a> </div>
															</div>
                                                            
															
														</div>
                                                        
                                                        
												</div>';
													
										  }
						
						
						?>
				
				
				
				
                  
					
					
					
					
					
					
                 
                </div>
            </div>
        </section>
      
        <section class="how-it-works">
            <div class="container">
                <div class="text-xs-center">
                   
                  <img src="images/abt.png" height=390>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="pay-info">Kattu Soru Is A Online Food Ordering Website that For Connect with Food Places The Stole Your Heart <br>Order Your Faviroute Food From Your Faviroute Places With Us </p>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="featured-restaurants">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="title-block pull-left">
                            <h4>Featured Restaurants</h4> </div>
                    </div>
                    <div class="col-sm-8">
                       
                        <div class="restaurants-filter pull-right">
                            <nav class="primary pull-left">
                                <ul>
                                    <li><a href="#" class="selected" data-filter="*">all</a> </li>
									<?php 
								
									$res= mysqli_query($db,"select * from res_category");
									      while($row=mysqli_fetch_array($res))
										  {
											echo '<li><a href="#" data-filter=".'.$row['c_name'].'"> '.$row['c_name'].'</a> </li>';
										  }
									?>
                                   
                                </ul>
                            </nav>
                        </div>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="restaurant-listing">
                        
						
						<?php  
						$ress= mysqli_query($db,"select * from restaurant");  
									      while($rows=mysqli_fetch_array($ress))
										  {
												
													$query= mysqli_query($db,"select * from res_category where c_id='".$rows['c_id']."' ");
													 $rowss=mysqli_fetch_array($query);
						
													 echo ' <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all '.$rowss['c_name'].'">
														<div class="restaurant-wrap">
															<div class="row">
																<div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
																	<a class="restaurant-logo" href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo"> </a>
																</div>
																<!--end:col -->
																<div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
																	<h5><a href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].'</span>
																	<div class="bottom-part">
																		<div class="cost"><i class="fa fa-check"></i> Min &#8377; 100</div>
																		<div class="mins"><i class="fa fa-motorcycle"></i> 30 min</div>
																		<div class="ratings"> <span>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star-o"></i>
																			</span> (153) </div>
																	</div>
																</div>
																<!-- end:col -->
															</div>
															<!-- end:row -->
														</div>
														<!--end:Restaurant wrap -->
													</div>';
										  }
						
						
						?>
						
							
						
					
                    </div>
                </div>
               
               
            </div>
        </section>
       

       
      
    
   
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>