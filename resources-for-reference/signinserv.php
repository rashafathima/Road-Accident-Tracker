<?php
    include("server.php");

    session_start();
    if(isset($_POST['login'])) {
        extract($_POST);
        mysqli_select_db($con, 'location');

        $UID =$_POST['UID'];
        $username =$_POST['username'];
        $password =$_POST['password'];
        $errors = array();
        
        if (empty($UID)) { array_push($errors, "UID is required"); }
        if (empty($username)) { array_push($errors, "Username is required"); }
        if (empty($password_1)) { array_push($errors, "Password is required"); }
        
        $sql="SELECT * FROM user where UID ='$UID' and username = '$username' and password = '$password'";
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result); 
        //while($row = mysqli_fetch_array( $result,MYSQLI_ASSOC)){ 
        //$count = mysqli_num_rows($result); 
        if ($row) { 

            if ($row['UID'] === $UID) {
                array_push($errors, "UID already exists");
            }
            if ($row['username'] === $username) {
                array_push($errors, "Username already exists");
            }
        }
        if (count($errors) == 0) {
        //if(mysqli_num_rows($result) == 1)
        $query = "INSERT INTO ` location`(`UID`, `Username`, `password`) VALUES ('$UID', '$username','$password')";
        mysqli_select_db($con, 'location');
        $_SESSION["UID"] = $row['UID'];
        $_SESSION["username"]=$row['username'];
        $_SESSION["password"]=$row['password'];
        header("Location: home.php"); 
        }
        else
    {
        echo "Invalid UID/Password";
    }

    }
?>
    