<?php
require "../partials/_dbconnect.php";
session_start();
if(!isset($_SESSION["loggedin"])){
    header("location: http://localhost/blog/admin/login");
    exit;
}

$cat = 0;
$total_blogs = 0;
$total_users = 0;

// Code for counting no of blogs
$sql = "SELECT * FROM `blogs`";
$result = mysqli_query($conn, $sql);
$total_blogs = mysqli_num_rows($result);
// Code for counting no of users 
$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);
$total_users = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/admin.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <a href="/blog/"><img src="../img/logo.png" alt=""></a>
            </div>
        </div>

        <?php require "../partials/_adminsidebar.php"; ?>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-blogger"></i>
                        <span class="text">Total Blogs</span>
                        <span class="number"><?php echo $total_blogs; ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Categories</span>
                        <span class="number"><?php echo $cat; ?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-user"></i>
                        <span class="text">Total Users</span>
                        <span class="number"><?php echo $total_users; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>

</html>