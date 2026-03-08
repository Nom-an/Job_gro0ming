<?php 
include("connect.php");

 $firstName = $_POST['first-name'];
 $lastName = $_POST['last-name'];
 $dob = $_POST['dob'];
 $gender = $_POST['gender'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $cpassword = $_POST['cpassword'];
 $mobile = $_POST['mobile'];
 $address = $_POST['address'];
 $role = $_POST['role'];
 
 if($password == $cpassword){
    $insert= mysqli_query($connect, "INSERT INTO user (first_name,last_name,email,mobile_number,address,date_of_birth,gender,password,employer_employe) VALUES ('$firstName','$lastName','$email','$mobile','$address','$dob','$gender','$password','$role')");
if($insert){
    echo '<script>
    alert("Registration successful");
    window.location="../login.html";
    </script>
    
    ';
}
else{
    echo '<script>
    alert("Some error occured ");
    window.location="./createAccount_view.php";
    </script>
    
    ';
    
}




 }else{
    echo '<script>
    alert("password and confirm password does not match !");
    </script>
    
    ';
 }

 



 
 





?>