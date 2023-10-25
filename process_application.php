<?php
if (isset($_POST['submit'])) {
    // Database configuration
    $db_host = "your_database_host"; // Change to your database host
    $db_user = "your_database_username"; // Change to your database username
    $db_pass = "your_database_password"; // Change to your database password
    $db_name = "your_database_name"; // Change to your database name

    // Connect to the database
    $db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get form data
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $place = mysqli_real_escape_string($db, $_POST['place']);
    $bike = mysqli_real_escape_string($db, $_POST['bike']);

    // Handle file upload
    $resume = "";
    if (isset($_FILES['resume'])) {
        $resume_name = $_FILES['resume']['name'];
        $resume_tmp_name = $_FILES['resume']['tmp_name'];
        $upload_dir = "uploads/"; // Create a directory for file uploads
        $resume = $upload_dir . $resume_name;

        if (move_uploaded_file($resume_tmp_name, $resume)) {
            // File uploaded successfully
        } else {
            echo "File upload failed.";
            exit;
        }
    }

    // Insert data into the "Delivery_p" table
    $insert_query = "INSERT INTO Delivery_p (name, email, phone, place, resume, bike) 
                    VALUES ('$name', '$email', '$phone', '$place', '$resume', '$bike')";

    if (mysqli_query($db, $insert_query)) {
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($db);
    }

    // Close the database connection
    mysqli_close($db);
}
?>
