<?php
require('config.php'); // Include the database configuration
require('auth.php');   // Include the authentication logic

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
}

// Fetch user orders from the database
$sql = "SELECT * FROM orders WHERE user_id = $user_id";
$orders_result = $conn->query($sql);

$orders = [];
if ($orders_result->num_rows > 0) {
    while ($row = $orders_result->fetch_assoc()) {
        $orders[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $user['name']; ?></h1>
    
    <!-- User Details -->
    <p>Name: <?php echo $user['name']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Address: <?php echo $user['address']; ?></p>
    
    <!-- User Orders -->
    <h2>Your Orders</h2>
    <ul>
        <?php foreach ($orders as $order) : ?>
            <li>Order ID: <?php echo $order['order_id']; ?></li>
            <li>Order Date: <?php echo $order['order_date']; ?></li>
            <li>Order Total: $<?php echo $order['order_total']; ?></li>
            <br>
        <?php endforeach; ?>
    </ul>
    
    <!-- Logout Link -->
    <p><a href="dashboard.php?logout=1">Logout</a></p>
</body>
</html>
