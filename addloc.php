<?php
$LID = filter_input(INPUT_POST, 'LID');
$Street = filter_input(INPUT_POST, 'Street');
$Pincode = filter_input(INPUT_POST, 'Pincode');
if (!empty($LID)){
if (!empty($Street)){
if (!empty($Pincode)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "road_accident_hotspot";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO location (LID, Street, Pincode)
values ('$LID','$Street','$Pincode')";
if ($conn->query($sql)){
echo "<script>alert('Location Added Successfully! Go back the last visited page!');</script>";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
}
else{
echo "Field should not be empty";
die();
}
}
else{
echo "Field should not be empty";
die();
}
?>
