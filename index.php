<?php
$con = mysqli_connect('localhost', 'root');

if($con){
    echo "Connection successful";
}else{
    echo "Connection failed";
}

mysqli_select_db($con, 'pet_store_db');

$pname =$_POST['pname'];
$desc =$_POST['desc'];
$cost =$_POST['cost'];

$query = "INSERT INTO `product`(`pr_name`, `description`, `cost`) VALUES ('$pname','$desc','$cost')";

mysqli_query($con, $query);

echo $query;
