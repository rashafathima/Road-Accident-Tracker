<?php

include("server.php");
    
        mysqli_select_db($con, 'road_accident_hotspot');
session_start();

if(isset($_POST['signin']))
{
    extract($_POST);
    $sql=mysqli_query($conn,"SELECT * FROM user where UID ='$UID' and username = '$username' and password = '$password'");
    //$row  = mysqli_fetch_array($sql);
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result); 
    if(is_array($row))
    {
        $_SESSION["UID"] = $row['UID'];
        $_SESSION["username"]=$row['username'];
        $_SESSION["password"]=$row['password']; 
        header("Location: main.php"); 
    }
    else
    {
        echo "Invalid UID/Password";
    }
}
?>
