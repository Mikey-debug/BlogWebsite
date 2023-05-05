<?php
session_start();
if(!isset($_SESSION["loggedin"])){
    header("location: http://localhost/blog/admin/login");
    exit;
}
$_SESSION = array();
session_destroy();
header("location: index.php");

?>