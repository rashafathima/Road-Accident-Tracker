 # for user table-
<?php 
$con = mysqli_connect('localhost', 'root');

if($con){
    echo "Connection successful";
}else{
    echo "Connection failed";
}

mysqli_select_db($con, 'Accident_Hotspot_db');

$UID =$_POST['UserID'];
$username =$_POST['username'];
$password =$_POST['password'];

$query = "INSERT INTO ` User`(`ID`, `Username`, `password`) VALUES ('$UID','$username','$password')";

mysqli_query($con, $query);

echo $query;
