<?php
$connection = mysqli_connect('localhost', 'root', '', 'road_accident_hotspot');

if(isset($_POST['delete']))
{
  $Street = $_POST['Street'];
  $Pincode = $_POST['Pincode'];

  $query7 = "DELETE FROM location WHERE Street='$Street' AND Pincode='$Pincode' ";
  $result7 = mysqli_query($connection, $query7);
  if($result7)
  {
    echo "<script>alert('Location deleted Successfully! Go back the last visited page!');</script>";

  }
  else {
    echo "<script>alert('Location not deleted! Go back the last visited page!');</script>";

  }


}

 ?>
