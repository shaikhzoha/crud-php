<?php 

$servername = "localhost";
$username= "root";
$password= "";
$database = "employee";

$conn = mysqli_connect($servername, $username, $password, $database); 

if(!$conn){
  echo "facing some issue";
}
?>