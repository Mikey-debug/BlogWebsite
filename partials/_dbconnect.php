<?php 

$server = "localhost";
$username = "root";
$password = "";
$database = "blog";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    echo "Can't Connect, Error: + mysqli_connect_error()";
}
// else{
//     echo "Success! Connected to Database";
// }




?>