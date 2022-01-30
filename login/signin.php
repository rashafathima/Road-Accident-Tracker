<?php

include("server.php");
        mysqli_select_db($con, 'location');
session_start();

if(isset($_POST['signin']))
{  
    $Email =$_POST['Email'];
    $password =$_POST['password'];
    $usertype = $_POST['usertype'];
    extract($_POST);
    $sql=mysqli_query($conn,"SELECT * FROM user where Email = '$Email' and password = '$password'");
    $result = mysqli_query($con, $sql);  
   // $row = mysqli_fetch_array($result); 
   if($usertypes['usertype'] == "admin")
   {
       $_SESSION['Email'] = $Email;
       header('Location: index.php');
   }
   else if($usertype['usertype'] == "user")
   {
       $_SESSION['Email'] = $Email;
       header('Location: home.php');
   }
   else
   {
       $_SESSION['status'] = "Email / Password is Invalid";
       header('Location: login.php');
   }
}
?>