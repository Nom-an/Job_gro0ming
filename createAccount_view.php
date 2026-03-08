<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/createAccount.css">
</head>
<body>

<div class="signup-container">
    <h2>Create Your Account</h2>

    <form action="./api/createAccount.php" method="POST">
        <div class="row">
            <div class="input-group">
                <label for="first-name">First name</label>
                <input type="text" id="first-name" name="first-name">
            </div>
            <div class="input-group">
                <label for="dob">Date of birth</label>
                <input type="date" id="dob" name="dob">
            </div>
        </div>

        <div class="row">
            <div class="input-group">
                <label for="last-name">Last name</label>
                <input type="text" id="last-name" name="last-name">
            </div>
            <div class="input-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender">
                   
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
        </div>

        <div class="row">
            <div class="input-group">
                <label for="mobile">Mobile no. (Optional)</label>
                <input type="text" id="mobile" name="mobile">
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="cpassword">
            </div>
        </div>

        <div class="row">
            <div class="input-group">
                <label for="address">Address (Optional)</label>
                <input type="text" id="address" name="address">
            </div>

            <div class="input-group">
                <label for="role">Employer/Employee</label>
                <select id="role" name="role">
                    
                    <option value="employer">Employer</option>
                    <option value="employee">Employee</option>
                </select>
            </div>
        </div>

        <div class="terms">


            <input type="checkbox" id="terms" name="terms">
            <label for="terms">I agree with <a href="#">terms and conditions</a></label>
        </div>
        <div class="btn"> 
          <button class="b" name="button"> Confirm </button>
           
        </div>

    </form>
</div>

</body>
</html>
