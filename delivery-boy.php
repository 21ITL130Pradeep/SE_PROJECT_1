<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include any necessary CSS and JavaScript files for the animation -->
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js"></script>
    <style>
        .delivery-boy-animation {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .delivery-boy-animation img {
            width: 50%; /* Adjust the width as needed */
        }

        .text-container {
            text-align: center;
            margin-top: 20px; /* Add spacing between the image and text */
        }
    </style>
</head>
<body>
    <!-- Create an animation for the delivery boy -->
    <div class="delivery-boy-animation">
        <img src="https://miro.medium.com/v2/resize:fit:1400/1*fE3JkGyzhWXlXApVnShDtw.gif" alt="Delivery Boy">
    </div>
    <div class="text-container">
        <h1>Your Order is Being Prepared</h1>
        <p>Estimated Delivery Time: <span id="delivery-time"></span></p>
        <div id="map-container">
            <iframe
                width="100%"
                height="450"
                frameborder="0"
                style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q=Perundurai"
                allowfullscreen
            ></iframe>
        </div>
    </div>

    <script>
        function startCountdown() {
            // Generate a random delivery time between 10-15 minutes
            const minTime = 10;
            const maxTime = 20;
            const deliveryTime = Math.floor(Math.random() * (maxTime - minTime + 1) + minTime);
            const deliveryTimeElement = document.getElementById('delivery-time');

            // Display the initial time
            deliveryTimeElement.textContent = deliveryTime + ' minutes';

            // Update the time every second
            const countdownInterval = setInterval(function() {
                deliveryTime--;
                deliveryTimeElement.textContent = deliveryTime + ' minutes';

                // Stop the countdown when it reaches 0
                if (deliveryTime <= 0) {
                    clearInterval(countdownInterval);
                    deliveryTimeElement.textContent = 'Your order is ready!';
                }
            }, 1000);
        }

        // Call the countdown function when the page loads
        window.onload = startCountdown;
    </script>
</body>
</html>
