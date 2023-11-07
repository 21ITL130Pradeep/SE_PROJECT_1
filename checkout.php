<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if (empty($_SESSION["user_id"])) {
    header('location: login.php');
} else {
    $item_total = 0;

    foreach ($_SESSION["cart_item"] as $item) {
        $item_total += ($item["price"] * $item["quantity"]);
    }

    if (isset($_POST['submit'])) {
        foreach ($_SESSION["cart_item"] as $item) {
            $SQL = "insert into users_orders(u_id, title, quantity, price) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "')";
            mysqli_query($db, $SQL);
        }
        $success = "Thank you! Your Order Placed Successfully!";
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="checkout.png">
    <title>Order Checkout</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    
    <div class="site-wrapper">
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">☰</button>
                    <a class="navbar-brand" href="home.php"> <img class="img-rounded" src="images\logo.png" alt="" height="35"> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                      
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a a href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            
                            <?php
                            if (empty($_SESSION["user_id"])) {
                                echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
                              <li class="nav-item"><a href="registration.php" class="nav-link active">Sign Up</a> </li>';
                            } else {
                                echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
                                echo  '<li class="nav-item"><a href="logout.php" class a nav-link active">Log Out</a> </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>
        
        <div class="container m-t-30">
            <span style="color:green;"><?php echo $success; ?></span>
        </div>
        
        <div class="container">
            <form action="" method="post">
                <div class="widget clearfix">
                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4>
                                        </div>
                                        <div class="cart-totals-fields">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> &#8377;<?php echo $item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping &amp; Handling</td>
                                                        <td>FREE*</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> &#8377;<?php echo $item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--cart summary-->
                                    <div class="payment-option">
                                        <ul class="list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Cash on delivery</span>
                                                    <br>
                                                    <span>Pay digitally with SMS Pay Link. Cash may not be accepted in COVID restricted areas.</span>
                                                </label>
                                            </li>
                                            <li>
                                                <form action="upi-payment.php" method="post">
                                                <button type="submit" name="upi_payment" class="btn btn-outline-success btn-sm" style="display: flex; align-items: center;">
            <i class="fas fa-wallet" style="margin-right: 5px;"></i> 
            UPI Payment
            <img src="images/upi.png" alt="UPI Logo" width="20" height="20" style="margin-left: 5px;" style="display: inline-block; margin-right: 10px;">
        </button>
                                                </form>
                                            </li>
                                           <br> <li>
                                                <form action="card-payment.php" method="post">
                                                <button type="submit" name="card_payment" class="btn btn-outline-success btn-sm" style="display: flex; align-items: center;">
            
            Card Payment
            <img src="images/paypal.jpg" alt="Card Logo" width="20" height="20" style="margin-left: 5px;">
        </button></form>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center">
                                            <input type="submit" onclick="return confirm('Are you sure?');" name="submit" class="btn btn-outline-success btn-block" value="Order now">
                                        </p>
                                    </div>
                                    <div class="text-center m-t-20">
                                <span style="color:green;"><?php echo $success; ?></span>
                            </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="app-section">
            <div class="app-wrap">
                <div class="container">
                    <div class="row text-img-block text-xs-left">
                        <div class="container">
                            <div class="col-xs-12 col-sm-5 right-image text-center">
                                <figure> <img src="images/app.png" alt="Right Image" class="img-fluid"> </figure>
                            </div>
                    
        </div>
        <!-- end:page wrapper -->
         </div>
            </div>
        </footer>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
</body>
</html>
