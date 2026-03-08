<?php
$connect=mysqli_connect("localhost","root","","job") or die("connection failed");

if($connect){
    echo " database connected ";
}
else{

    echo "database connection failed ";
}

?>