<?php
session_start();

if (isset($_SESSION['userdata'])) {
    unset($_SESSION['userdata']);
    echo '<script>
    alert("Logout Successful.");
    window.location="../login.html";
    </script>
    
    ';
}else{

    echo '<script>
    alert("Session not found.");
    window.location="./login.html";
    </script>
    
    ';

}



?>