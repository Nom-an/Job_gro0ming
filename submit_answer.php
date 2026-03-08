<?php
session_start();

// Include database connection
include 'api/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jobRole = $_POST['jobRole'];
    $email = $_POST['email'];
    //$answers = $_POST['answers'];

    $answers = isset($_POST['answers']) ? $_POST['answers'] : [];  // Check if 'answers' is set
    
    // Check if the answers array is empty
    if (empty($answers)) {
        die("No answers submitted.");
    }
    
    $stmt = $connect->prepare("SELECT cvPath FROM user WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();

    var_dump($email);
    
    if ($userData && !empty($userData['cvPath'])) {
        $cvPath = $userData['cvPath'];
    } else {
        die("No CV found for this user. Please generate one before applying.");
    }

    // Fetch user's saved CV path from the database
    //$query = "SELECT cvPath FROM user WHERE email = '$email' LIMIT 1";
    //$result = mysqli_query($connect, $query);
    //$userData = mysqli_fetch_assoc($result);
    
    if ($userData && !empty($userData['cvPath'])) {
        $cvPath = $userData['cvPath'];
    } else {
        die("No CV found for this user. Please generate one before applying.");
    }


    // Fetch correct answers from the database for the given jobRole
    $query = "SELECT id, correctAnswer FROM questions WHERE jobRole = '$jobRole'";
    $result = mysqli_query($connect, $query);
    
    $score = 0;
    $totalQuestions = 0;

    // Compare user's answers with correct answers
    while ($row = mysqli_fetch_assoc($result)) {
        $totalQuestions++;
        $questionId = $row['id'];
        
        if (isset($answers[$questionId]) && $answers[$questionId] == $row['correctAnswer']) {
            $score++;
        }
    }

    // Calculate percentage
    $percentage = ($score / $totalQuestions) * 100;

    // Insert the result into the database (you can keep this in the 'results' table if needed)
    $insertResultQuery = "INSERT INTO results (jobRole, userEmail, score, percentage) VALUES ('$jobRole', '$email', '$score', '$percentage')";
    mysqli_query($connect, $insertResultQuery);

    // Store the candidate's CV and email in the `candidates` table
    $jobIdQuery = "SELECT id FROM post_job WHERE jobRole = '$jobRole' LIMIT 1";
    $jobIdResult = mysqli_query($connect, $jobIdQuery);
    $jobRow = mysqli_fetch_assoc($jobIdResult);
    $jobId = $jobRow['id'];

    $insertCandidateQuery = "INSERT INTO candidates (jobRole, jobId, userEmail, cvPath) VALUES ('$jobRole', '$jobId', '$email', '$cvPath')";
    mysqli_query($connect, $insertCandidateQuery);

    // Show the score to the user
    echo "<h2>Your Score: $score out of $totalQuestions</h2>";
    echo "<h2>Percentage: " . round($percentage, 2) . "%</h2>";
    
    echo "<h2>Your application has been submitted successfully!</h2>";
}
?>
