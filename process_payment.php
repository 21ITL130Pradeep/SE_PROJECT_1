<?php
// Include the Twilio PHP library if you're using Twilio for SMS
require_once 'twilio-php/Services/Twilio.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect credit card details from the form
    $cardNumber = $_POST["card_number"];
    $expirationDate = $_POST["expiration_date"];
    $cvv = $_POST["cvv"];

    // You should perform credit card validation here
    // Ensure that the credit card is valid and the amount is correct

    // Generate a random OTP (6 digits)
    $otp = sprintf("%06d", mt_rand(1, 999999));

    // Store the payment request and OTP in the database
    $conn = new mysqli("localhost", "username", "password", "your_database");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $insertPaymentQuery = "INSERT INTO payments (card_number, expiration_date, cvv, otp) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertPaymentQuery);
    $stmt->bind_param("ssss", $cardNumber, $expirationDate, $cvv, $otp);

    if ($stmt->execute()) {
        // Send OTP to the user's mobile using Twilio
        $twilioAccountSid = "your_account_sid";
        $twilioAuthToken = "your_auth_token";
        $twilioFromNumber = "your_twilio_phone_number";
        $userMobileNumber = "user_mobile_number"; // User's mobile number

        $client = new Services_Twilio($twilioAccountSid, $twilioAuthToken);
        $message = $client->account->messages->create(
            $userMobileNumber,
            array(
                "from" => $twilioFromNumber,
                "body" => "Your OTP for payment: " . $otp
            )
        );

        echo "OTP sent to your mobile. Please enter the OTP to confirm the payment.";
    } else {
        echo "Payment failed. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>
