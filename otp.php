<?php
session_start();

// Check if the user has submitted the initial form to request OTP
if (isset($_POST['send_otp'])) {
    // Generate a random 6-digit OTP
    $otp = rand(100000, 999999);

    // Save the OTP in a session for verification
    $_SESSION['otp'] = $otp;

    // Send the OTP to the user's provided contact (e.g., email or phone number)
    $contact = $_POST['contact'];
    // You can implement the logic to send the OTP here (e.g., via email or SMS)

    // Display a form for OTP input
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>OTP Verification</title>';
    echo '</head>';
    echo '<body>';
    echo '<h1>Order Verification</h1>';
    echo '<form method="post" action="">';
    echo '<label for="user_otp">Enter OTP:</label>';
    echo '<input type="text" name="user_otp" id="user_otp" required>';
    echo '<input type="submit" name="verify_otp" value="Verify OTP">';
    echo '</form>';
    echo '</body>';
    echo '</html>';
    exit();
}

// Check if the user has submitted the OTP verification form
if (isset($_POST['verify_otp'])) {
    $user_otp = $_POST['user_otp'];
    $otp = $_SESSION['otp'];

    if ($user_otp == $otp) {
        // OTP is correct, process the order
        // You can add your order processing logic here

        // Redirect to the delivery page upon successful verification
        header("Location: your_orders.php");
        exit();
    } else {
        // OTP is incorrect, display an error message
        echo 'Incorrect OTP. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
</head>
<body>
    <h1>Order Verification</h1>
    <form method="post" action="">
        <label for="contact">Enter Email/Phone:</label>
        <input type="text" name="contact" id="contact" required>
        <input type="submit" name="send_otp" value="Send OTP">
    </form>
</body>
</html>
