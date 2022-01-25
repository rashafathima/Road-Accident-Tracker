<?php
    include("server.php");

    session_start();
    if(isset($_POST['login'])) {
        extract($_POST);
        mysqli_select_db($con, 'Accident_Hotspot_db');

        $UID =$_POST['UserID'];
        $username =$_POST['username'];
        $password =$_POST['password'];

        
        $sql="SELECT * FROM user where UserID='$UID' and username = '$username' and password = '$password'"
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result);  
        $count = mysqli_num_rows($result); 
        if ($row) { // if user exists

            if ($user['UserID'] === $UID) {
            echo "UserID already exists"
            }
            if ($row['username'] === $username) {
            echo "Username already exists"
            }
        }
        if($count == 1)
        {
        $query = "INSERT INTO ` User`(`UID`, `Username`, `password`) VALUES ('$UID', '$username','$password')";
        $_SESSION["UserID"] = $row['UID'];
        $_SESSION["username"]=$row['username'];
        $_SESSION["password"]=$row['password'];
        header("Location: home.php"); 
        }
        else
    {
        echo "Invalid User-ID/Password";
    }

    }
?>
    