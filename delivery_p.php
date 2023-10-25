<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Delivery Partner Job</title>
    <link href="css/del.css" rel="stylesheet">
</head>
<body>
    
    <form action="process_application.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required><br><br>
        
        <label for="place">Place Of Living</label>
        <input type="text" id="place" name="place" required><br><br>

        <label for="resume">Upload Resume (PDF or Word):</label>
        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required><br><br>
        
        <label>*Having Bike?
            <input type="radio" name="bike" value="Yes">Yes
            <input type="radio" name="bike" value="No">No
        </label><br><br>
        
        <input type="submit" name="submit" value="Submit Application">
    </form>
</body>
</html>
