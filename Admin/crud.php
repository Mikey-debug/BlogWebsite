<?php

require "../partials/_dbconnect.php";
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location: http://localhost/blog/admin/login");
    exit;
}

if (!empty($_GET['delete_blog'])) {
    $delete_blog = $_GET['delete_blog'];
    
    // Check if blog exist or not
    $sql = "SELECT * FROM `blogs` WHERE `blogs`.`sno` = $delete_blog";
    $result = mysqli_query($conn, $sql);
    $affected_row = mysqli_num_rows($result);

    if ($affected_row > 0) {
        // Query for deleting blogs
        $sql = "DELETE FROM `blogs` WHERE `blogs`.`sno` = $delete_blog";
        $result = mysqli_query($conn, $sql);
        echo "blog deleted";

    } else {
        echo "Blog doesn't exist or already been deleted";
    }

//For newer version
// Confirmtion box



    
}
