<!DOCTYPE html>
<html lang="en">
<head>
    <title>Credit Card Payment</title>
    <style>/* Style for payment.php page */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    text-align: center;
}

h2 {
    color: #333;
}

form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background: #45a049;
}

/* Style for process_payment.php page */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    text-align: center;
}

h2 {
    color: #333;
}

.success-message {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background: #4CAF50;
    color: white;
    border-radius: 5px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

.failure-message {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background: #FF5733;
    color: white;
    border-radius: 5px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}
</style>
</head>
<body>
    <h2>Enter Credit Card Details</h2>
    <form action="food-ready.php" method="post">
        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" required><br>

        <label for="expiration_date">Expiration Date (MM/YY):</label>
        <input type="text" id="expiration_date" name="expiration_date" required><br>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br>

        <input type="submit" value="Submit Payment">
    </form>
</body>
</html>
