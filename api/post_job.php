<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "database connected";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check for required fields
    if (
        !empty($_POST['jobTitle']) &&
        !empty($_POST['tags']) &&
        !empty($_POST['jobRole']) &&
        !empty($_POST['minSalary']) &&
        !empty($_POST['maxSalary']) &&
        !empty($_POST['salaryType']) &&
        !empty($_POST['education']) &&
        !empty($_POST['experience']) &&
        !empty($_POST['jobType']) &&
        !empty($_POST['vacancies']) &&
        !empty($_POST['expirationDate']) &&
        !empty($_POST['jobLevel']) &&
        !empty($_POST['applyOption'])
    ) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO post_job (jobTitle, tags, jobRole, minSalary, maxSalary, salaryType, education, experience, jobType, vacancies, expirationDate, jobLevel, applyOption, postedDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "sssdssssisssss", 
            $jobTitle, $tags, $jobRole, $minSalary, $maxSalary, $salaryType, $education, $experience, $jobType, $vacancies, $expirationDate, $jobLevel, $applyOption, $postedDate
        );

        // Set parameters
        $jobTitle = $_POST['jobTitle'];
        $tags = $_POST['tags'];
        $jobRole = $_POST['jobRole'];
        $minSalary = $_POST['minSalary'];
        $maxSalary = $_POST['maxSalary'];
        $salaryType = $_POST['salaryType'];
        $education = $_POST['education'];
        $experience = $_POST['experience'];
        $jobType = $_POST['jobType'];
        $vacancies = $_POST['vacancies'];
        $expirationDate = $_POST['expirationDate'];
        $jobLevel = $_POST['jobLevel'];
        $applyOption = $_POST['applyOption'];
        $postedDate = time();

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>
    alert("Registration successful");
    window.location="../profile.php";
    </script>
    
    ';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Required fields are missing!";
    }
}

$conn->close();
?>
