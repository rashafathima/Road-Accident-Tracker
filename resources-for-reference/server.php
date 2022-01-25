<?php

//if(isset($_POST['submit'])) 
$servername = "localhost"; 
    $username = "root"; 
    $password = "";
    $database = "";
   
     $conn = mysqli_connect($servername, 
         $username, $password, $database);
$con = mysqli_connect('localhost', 'root','','road_accident_hotspot');

if($con){
    
}
else{
    echo "Connection failed";
}

?>
