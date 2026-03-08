<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Page</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .container {
            width: 60%;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .settings-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 10px;
        }

        .tab {
            border: none;
            background-color: #fff;
            font-size: 16px;
            color: #333;
            cursor: pointer;
            padding: 10px 20px;
            border-bottom: 2px solid transparent;
        }

        .tab.active {
            border-bottom: 2px solid #63c76a;
        }

        .form-section {
            margin-top: 30px;
            display: none;
        }

        .form-section.active-section {
            display: block;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        input, select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
        }

        button.save-btn {
            grid-column: span 2;
            background-color: #63c76a;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button.save-btn:hover {
            background-color: #55b360;
        }

        .resume-section {
            margin-top: 40px;
        }

        .resume-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .resume-item, .resume-upload {
            display: flex;
            flex-direction: column;
            padding: 15px;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 5px;
            align-items: center;
        }

        .resume-item p {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }

        .resume-item span {
            font-size: 12px;
            color: #888;
            margin-bottom: 10px;
        }

        .resume-btn {
            padding: 5px 10px;
            background-color: #63c76a;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .resume-btn:hover {
            background-color: #55b360;
        }

        
        .form-group {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 14px;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #555;
        }

        
        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-card {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .profile-left {
            display: flex;
            align-items: center;
        }

        .profile-pic-large {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-info {
            max-width: 300px;
        }

        .profile-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .edit-profile-btn, .change-password {
            background-color: #63c76a;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .edit-profile-btn:hover, .change-password:hover {
            background-color: #55b360;
        }

        .profile-details, .professional-details {
            margin-top: 20px;
        }

        .professional-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="settings-header">
            <h1>Settings</h1>
            <div class="tabs">
                <button class="tab active" data-tab="personal-info">Personal</button>
                <button class="tab" data-tab="company-info">Company Info</button>
                <button class="tab" data-tab="profile-info">Profile</button>
                <button class="tab" data-tab="social-links">Social Links</button>
            </div>
        </div>

       
        <div class="form-section active-section" id="personal-info">
            <h2>Basic Information</h2>
            <form class="form">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="headline">Title/Headline</label>
                    <input type="text" id="headline" placeholder="Enter your title or headline">
                </div>
                <div class="form-group">
                    <label for="experience">Experience</label>
                    <select id="experience">
                        <option value="">Select...</option>
                        <option value="junior">Junior</option>
                        <option value="mid">Mid-Level</option>
                        <option value="senior">Senior</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="education">Education</label>
                    <select id="education">
                        <option value="">Select...</option>
                        <option value="highschool">High School</option>
                        <option value="bachelor">Bachelor's Degree</option>
                        <option value="masters">Master's Degree</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="website">Personal Website</label>
                    <input type="url" id="website" placeholder="Website url...">
                </div>
                <button type="submit" class="save-btn">Save Changes</button>
            </form>

          
            <div class="resume-section">
                <h2>Your Cv/Resume</h2>
                <div class="resume-list">
                    <div class="resume-item">
                        <p>Professional Resume</p>
                        <span>3.5 MB</span>
                        <button class="resume-btn">Edit</button>
                    </div>
                    <div class="resume-item">
                        <p>Product Designer</p>
                        <span>4.7 MB</span>
                        <button class="resume-btn">Edit</button>
                    </div>
                    <div class="resume-item">
                        <p>Visual Designer</p>
                        <span>1.3 MB</span>
                        <button class="resume-btn">Edit</button>
                    </div>
                    <div class="resume-upload">
                        <label for="upload-cv">
                            <div class="upload-box">
                                <span>Add Cv/Resume</span>
                                <small>Browse file or drop here. Only pdf.</small>
                            </div>
                        </label>
                        <input type="file" id="upload-cv" hidden>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="form-section" id="company-info">
            <h2>Company Information</h2>
            <form class="form">
                <div class="form-group">
                    <label for="company-name">Company Name</label>
                    <input type="text" id="company-name" placeholder="Enter company name">
                </div>
                <div class="form-group">
                    <label for="industry">Industry</label>
                    <input type="text" id="industry" placeholder="Enter industry">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" placeholder="Enter company location">
                </div>
                <div class="form-group">
                    <label for="company-size">Company Size</label>
                    <input type="number" id="company-size" placeholder="Enter number of employees">
                </div>
                <button type="submit" class="save-btn">Save Changes</button>
            </form>
        </div>

       
        <div class="form-section" id="profile-info">
            <h2>Profile Information</h2>

            <div class="profile-header">
                <button class="back-btn">Back</button>
                <h1>My Profile</h1>
            </div>

            <div class="profile-card">
                <div class="profile-left">
                    <img src="83250251_1327282404126114_102215656094564352_n.jpg" alt="Profile Picture" class="profile-pic-large">
                    <div class="profile-info">
                        <h2>James Landry</h2>
                        <p>janejames.20@gmail.com</p>
                        <p>Graphic Designer</p>
                    </div>
                </div>

                <div class="profile-right">
                    <button class="edit-profile-btn">Edit Profile</button>
                    <a href="#" class="change-password">Change Password?</a>
                </div>
            </div>

            <div class="profile-details">
                <p><strong>DOB:</strong> April 25, 2024</p>
                <p><strong>Contact No:</strong> +91-7979134679</p>
                <p><strong>Gender:</strong> Male</p>
                <p><strong>Address:</strong> 1245 Jane Street, Dubai</p>
            </div>

            <div class="professional-details">
                <h2>Professional Details</h2>
                <div class="professional-item">
                    <p><strong>Designation:</strong> Graphic Designer</p>
                    <p><strong>Term:</strong> March, 2024 - Present</p>
                </div>
                <div class="professional-item">
                    <p><strong>Designation:</strong> Visual Designer</p>
                    <p><strong>Term:</strong> Feb, 2022 - Feb, 2023</p>
                </div>
                <p><strong>Work Experience:</strong> 5 Years</p>
            </div>
        </div>

        
        <div class="form-section" id="social-links">
            <h2>Social Links</h2>
            <form class="form">
                <div class="form-group">
                    <label for="linkedin">LinkedIn</label>
                    <input type="url" id="linkedin" placeholder="Enter LinkedIn profile URL">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="url" id="twitter" placeholder="Enter Twitter profile URL">
                </div>
                <div class="form-group">
                    <label for="github">GitHub</label>
                    <input type="url" id="github" placeholder="Enter GitHub profile URL">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="url" id="facebook" placeholder="Enter Facebook profile URL">
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="url" id="instagram" placeholder="Enter Instagram profile URL">
                </div>
                <div class="form-group">
                    <label for="portfolio">Portfolio</label>
                    <input type="url" id="portfolio" placeholder="Enter Portfolio URL">
                </div>
                <button type="submit" class="save-btn">Save Changes</button>
            </form>
        </div>
    </div>

    <script>
        const tabs = document.querySelectorAll('.tab');
        const sections = document.querySelectorAll('.form-section');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                sections.forEach(section => section.style.display = 'none');
                const targetSection = document.getElementById(this.getAttribute('data-tab'));
                targetSection.style.display = 'block';
            });
        });
    </script>
</body>
</html>
