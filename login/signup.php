<?php
    include("server.php");

    session_start();
    if(isset($_POST['signup'])) {
        extract($_POST);
        mysqli_select_db($con, 'location');

        $Email =$_POST['Email'];
        $password =$_POST['password'];
        $confirmpassword =$_POST['confirmpassword'];
        $usertype = $_POST['usertype'];
        $errors = array();
        
        if (empty($Email)) { array_push($errors, "Email is required"); }
        if (empty($password)) { array_push($errors, "Password is required"); }
        if (empty($confirmpassword)) { array_push($errors, "Re-enter the password"); }
        $sql=mysqli_query($conn,"SELECT * FROM register WHERE email='$email' ");
       $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
            $_SESSION['status_code'] = "error";
            header('Location: register.php');  
        }
        else 
        {
            if($password == $confirmpassword)
            $query = "INSERT INTO user (Email,password) VALUES ('$Email','$password')";
            $query_run = mysqli_query($con, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: Login.php');  
            }
        }

}
?>