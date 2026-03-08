<?php
include("api/connect.php");
session_start();

if (isset($_SESSION['userdata'])) {
    // Fetch all job posts from the database
    $stmt = $connect->prepare("SELECT * FROM post_job"); // Get all job posts
    $stmt->execute();
    $result = $stmt->get_result();

    // Store posts in an array for later use
    $posts = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    } else {
        echo "Debug: No posts found in the database.";
    }

    $stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Dashboard</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar"> 
        <div class="logo"><img src="images/user.jpg" alt=""></div>
        <input type="text" class="search-bar" placeholder="Search...">
        <div class="nav-links">
            <button class="btn"><a style="text-decoration: none; color:white " href="">Find Job</a></button>
            <a href="postJob.html"><button class="btn">Post Job</button></a>
            <a href="api/logout.php"><button class="btn">Logout</button></a>
            <div class="user-icons">
                <span class="icon message"><a href=""><img src="WeBproject/asset/messenger.png" style="width: 30px; height: 30px;"></a></span>
                <span class="icon bell"><a href=""><img src="WeBproject/asset/bell.png" style="width: 30px; height: 30px;"></a></span>
                <img src="images/user.jpg" alt="User Avatar" class="user-avatar">
            </div>
        </div>
    </div>

    <!-- Profile Header -->
    <div class="profile-header">
        <img src="images/user1.jpg" alt="Profile" class="profile-pic">
        <div class="profile-details">
            <h2><?=$_SESSION['userdata']['first_name']?></h2>
            <p><?=$_SESSION['userdata']['email']?></p>
        </div>
        <button class="edit-profile-btn"><a style="text-decoration: none; color:white " href="UpdateAccount.php">Edit Profile</a></button>
    </div>

    <!-- Main Content Container -->
    <div class="main-container">
        <!-- Left Sidebar (About Section) -->
        <div class="sidebar">
            <h3>About</h3>
            <p>Hi! I'm Stas, the Senior UI Designer at Vibrant. We hope you enjoy the design and quality of Social.</p>
            <ul>
                <li><strong>Joined:</strong> November 15, 2015</li>
                <li><strong>Lives:</strong> New York, USA</li>
                <li><strong>Email:</strong> me@noibleui.com</li>
                <li><strong>Website:</strong> www.noibleui.com</li>
            </ul>
            <button class="logout-btn">Log Out</button>
        </div>

        <!-- Post Section -->
        <div class="posts-section">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="post">
                        <img src="images/user3.jpg" alt="Post Image" class="post-img">
                        <h3><?= htmlspecialchars($post['jobTitle']) ?></h3>
                        <p><?= htmlspecialchars($post['tags']) ?></p>
                        <div class="post-meta">
                            <span>Min Salary: <?= htmlspecialchars($post['minSalary']) ?> USD</span>
                            <span>Posted on: <?= date('F j, Y', strtotime($post['postedDate'])) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No job posts available.</p>
            <?php endif; ?>
            <button class="show-more-btn">Show more</button>
        </div>

        <!-- Right Sidebar (Suggestions Section) -->
        <div class="suggestions">
            <h3>Suggestions</h3>
            <ul>
                <li>UI/UX Designer - Full Time - Minnesota, USA - $100K-$150K - 4 Days Remaining</li>
                <li>Senior UX Designer - Full Time - United Kingdom - $300K-$350K - 4 Days Remaining</li>
                <li>Networking Engineer - Full Time - Michigan, USA - $5K-$10K - 4 Days Remaining</li>
                <li>Marketing Officer - Full Time - Montana, USA - $50K-$60K - 3 Years Experience</li>
            </ul>
        </div>
    </div>

</body>
</html>

<?php
} else {
    echo '<script>
    alert("You have to login first.");
    window.location="./login.html";
    </script>';
}
?>
