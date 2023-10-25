<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
    <style>
        .centered-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .amount-text {
            font-size: 24px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    
    <script>
        function displayQRCode() {
            var urlParams = new URLSearchParams(window.location.search);
            var amount = urlParams.get('amount');

            // Show a confirmation alert
            var confirmPayment = confirm("Are You Sure to Pay using UPI payment?");
            
            // Check if the user confirmed the payment
            if (confirmPayment) {
                var centeredDiv = document.createElement("div");
                centeredDiv.className = "centered-container";
                var qrImage = document.createElement("img");
                qrImage.src = 'http://localhost/Foodpicky/images/QR.jpg';
                qrImage.alt = "QR Code Image";
                qrImage.width = 300;
                qrImage.height = 300;
                var amountText = document.createElement("div");
                amountText.className = "amount-text";
                amountText.textContent = "Scan This Code to Pay: ₹" + amount;
                centeredDiv.appendChild(qrImage);
                centeredDiv.appendChild(amountText);
                document.body.appendChild(centeredDiv);

                setTimeout(function () {
                    window.location.href = 'food-ready.php';
                }, 10000);
            } else {
                // Handle the case where the user didn't confirm the payment
                alert("Payment canceled. Redirecting to previous page...");
                // Redirect to the previous page or handle it as needed
                window.history.back();
            }
        }

        window.onload = displayQRCode;
    </script>
</body>
</html>
