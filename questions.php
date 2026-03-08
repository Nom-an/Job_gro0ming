<?php
ini_set('session.cookie_path', '/');
session_start();
// Include database connection
include 'api/connect.php';

// Check if user is logged in
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    die("User is not logged in. Please log in to continue.");
}


// Get jobRole from the URL
$jobRole = $_GET['jobRole'];

// Fetch questions for the jobRole from the database
$query = "SELECT * FROM questions WHERE jobRole = '$jobRole' LIMIT 10";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Questions</title>
    <link rel="stylesheet" href="questions.css"> 
</head>
<body>

    <h1>Multiple Choice Questions for <?php echo htmlspecialchars($jobRole); ?></h1>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <form action="submit_answer.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="jobRole" value="<?php echo htmlspecialchars($jobRole); ?>">
            
             <!-- Assume the user email comes from a logged-in user session -->
             <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
            
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="question">
                    <p><strong><?php echo htmlspecialchars($row['question']); ?></strong></p>
                    <label><input type="radio" name="answers[<?php echo $row['id']; ?>]" value="A"> <?php echo htmlspecialchars($row['optionA']); ?></label><br>
                    <label><input type="radio" name="answers[<?php echo $row['id']; ?>]" value="B"> <?php echo htmlspecialchars($row['optionB']); ?></label><br>
                    <label><input type="radio" name="answers[<?php echo $row['id']; ?>]" value="C"> <?php echo htmlspecialchars($row['optionC']); ?></label><br>
                    <label><input type="radio" name="answers[<?php echo $row['id']; ?>]" value="D"> <?php echo htmlspecialchars($row['optionD']); ?></label><br>
                </div>
            <?php endwhile; ?>
            <button type="submit">Submit Answers</button>
        </form>
    <?php else: ?>
        <p>No questions available for this job role.</p>
    <?php endif; ?>

</body>
</html>
