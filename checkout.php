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
}

$message = "";

if (isset($_POST['submit'])) {
    // Handle other payment methods here
    $message = "Your Order Is Being Prepared. Thank you for your order.";
} elseif (isset($_POST['upiPayment'])) {
    // Show a JavaScript alert before proceeding
    echo '<script>alert("You will be redirected to UPI payment. Click OK to continue.");</script>';
    $totalAmount = $item_total;
    header("Location: upi-payment.php?amount=$totalAmount");
} elseif (isset($_POST['cardPayment'])) {
    // Handle card payment here
    header("Location: card-payment.php");
} elseif (isset($_POST['cashOnDelivery'])) {
    // Display an alert for Cash on Delivery and redirect
    echo '<script>
        if (confirm("Are you sure to order using Cash on Delivery?")) {
            window.location = "food-ready.php";
        }
    </script>';
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                    <a class="navbar-brand" href="home.php"> <img class="img-rounded" src="images\logo.png" alt="" height="55"> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><br> <a class="nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            <?php
                            if (empty($_SESSION["user_id"])) {
                                echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
                                <li class="nav-item"><a href="registration.php" class="nav-link active">Sign Up</a> </li>';
                            } else {
                                echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
                                echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">LogOut</a> </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>
        <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick your favorite dishes</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active" ><span>3</span><a href="checkout.php">Get delivered & Pay</a></li>
                    </ul>
                </div>
            </div>
            <div class="container m-t-30">
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
                                            </ul>
                                            <ul>
                                                <li>
                                                    <label class="custom-control custom-radio m-b-10">
                                                        <input name="mod" type="radio" value="upi" class="custom-control-input">
                                                        <button type="submit" name="upiPayment" class="btn btn-outline-primary btn-block">UPI Payment</button>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="custom-control custom-radio m-b-10">
                                                        <input name="mod" type="radio" value="card" class="custom-control-input">
                                                        <button type="submit" name="cardPayment" class="btn btn-outline-primary btn-block">Card Payment <span class="custom-control-description">Credit Card<img src="images/paypal.jpg" alt="" width="90"></span></button>
                                                    </label>
                                                </li>
                                            </ul>
                                            <p class="text-xs-center">
                                                <button type="submit" name="cashOnDelivery" class="btn btn-outline-success btn-block">Order now</button>
                                                <?php
                                                if (!empty($message)) {
                                                    echo '<p>' . $message . '</p>';
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <section class="app-section">
                <!-- Your app section content here -->
            </section>
        </div>
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
