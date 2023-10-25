<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Food Place</title>
    <link href="css/cl.css" rel="stylesheet">
</head>
<body>
    
    <form action="process_application.php" method="POST" enctype="multipart/form-data">
        <label for="name">Shop Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Owner Name:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required><br><br>
        
        <label for="place">Address</label>
        <input type="text" id="place" name="place" required><br><br>


        <label for="resume">Upload Food Menu</label>
        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required><br><br>
        
        <label>*Type Of Food Place
            <input type="radio" name="foodplace" value="Hotel">HOTEL
            <input type="radio" name="foodplace" value="Cloud Kitchen">CLOUD KITCHEN
        </label><br><br>
        <input type="submit" name="submit" value="Submit Application">
    </form>
</body>
</html>
