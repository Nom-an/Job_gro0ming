<?php
session_start();

// Include database connection
include 'api/connect.php';

echo "Email in session: " . $_SESSION['email'];

// Fetch job postings from the database
$query = "SELECT * FROM post_job";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link rel="stylesheet" href="jobs.css"> 
</head>
<body>

    <header>
    	<img src="asset/messenger.png" style="width: 30px; height: 30px;">
    	<img src="asset/bell.png" style="width: 30px; height: 30px;">
    	<img src="asset/instagram.png" style="width: 30px; height: 30px;">
    	<a id="home" href="http://127.0.0.1:5500/sujoggg1/index.html">Home</a>
    </header>

    <div class="search-bar">
        <input type="text" placeholder="Job title, Keyword...">
        <input type="text" placeholder="Location">
        <select>
            <option value="">Select Category</option>
            <option value="design">Design</option>
            <option value="development">Development</option>
            <!-- Add more options as needed -->
        </select>
        <button class="filter-btn">Advance Filter</button>
        <button class="find-job-btn">Find Job</button>
    </div>

    <div class="job-listings">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="job-card">
                    <h2><?php echo htmlspecialchars($row['jobTitle']); ?></h2>
                    <p><span>Role: </span><?php echo htmlspecialchars($row['jobRole']); ?></p>
                    <p><span>Tags: </span><?php echo htmlspecialchars($row['tags']); ?></p>
                    <p><span>Salary: </span><?php echo htmlspecialchars($row['minSalary']) . " - " . htmlspecialchars($row['maxSalary']) . " " . htmlspecialchars($row['salaryType']); ?></p>
                    <p><span>Education: </span><?php echo htmlspecialchars($row['education']); ?></p>
                    <p><span>Experience: </span><?php echo htmlspecialchars($row['experience']); ?></p>
                    <p><span>Job Type: </span><?php echo htmlspecialchars($row['jobType']); ?></p>
                    <p><span>Vacancies: </span><?php echo htmlspecialchars($row['vacancies']); ?></p>
                    <p><span>Expiration Date: </span><?php echo htmlspecialchars($row['expirationDate']); ?></p>
                    <p><span>Job Level: </span><?php echo htmlspecialchars($row['jobLevel']); ?></p>
                    <p><span>Apply: </span><?php echo htmlspecialchars($row['applyOption']); ?></p>
                    <!-- Apply Button -->
                    <a href="questions.php?jobRole=<?php echo urlencode($row['jobRole']); ?>" class="apply-btn">Apply Now</a>
                    
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No jobs available at the moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>
