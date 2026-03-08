<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'api/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pdf'])) {
    $email = $_POST['email'];
    $pdfTmpName = $_FILES['pdf']['tmp_name'];
    $pdfName = $_FILES['pdf']['name'];

    $cvDir = "uploads/cvs/"; // Directory where CVs are stored
    $cvPath = $cvDir . basename($pdfName);

    // Move uploaded file to the desired directory
    if (move_uploaded_file($pdfTmpName, $cvPath)) {
        // Update the user's profile in the database with the CV path
        $query = "UPDATE user SET cvPath = '$cvPath' WHERE email = '$email'";
        if (mysqli_query($connect, $query)) {
            echo "CV saved successfully.";
        } else {
            echo "Database error: Unable to save CV.";
        }
    } else {
        echo "Error uploading CV.";
    }
} else {
    echo "Invalid request.";
}
?>
