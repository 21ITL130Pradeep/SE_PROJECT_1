<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include any necessary CSS and JavaScript files for the animation -->
</head>
<body>
    <!-- Create an animation for "Food is Ready" -->
    <div class="food-ready-animation">
        

        <img src="images/confirm.gif" alt="Food Ready" height='895px'>
    </div>

    <!-- After a delay, redirect to the next step (delivery boy) -->
    <script>
        setTimeout(function () {
            window.location.href = 'delivery-boy.php';
        }, 7500); // Delay in milliseconds (3.5 seconds)
    </script>
</body>
</html>
