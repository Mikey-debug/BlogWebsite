<?php
require "../partials/_dbconnect.php";
session_start();
if(!isset($_SESSION["loggedin"])){
    header("location: http://localhost/blog/admin/login");
    exit;
}
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
        <?php require "../partials/_adminsidebar.php" ?>
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
        <div class="activity">
                <div class="title">
                    <i class="uil uil-user"></i>
                    <span class="text">Users</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <?php
                        $sql = "SELECT * FROM `users`";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result))
                        echo '<span class="data-list">'.$row['name'].'</span>';
                        ?>
                    </div>
                    <div class="data names">
                        <span class="data-title">Username</span>
                        <?php
                        $sql = "SELECT * FROM `users`";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result))
                        echo '<span class="data-list">'.$row['username'].'</span>';
                        ?>
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <?php
                        $sql = "SELECT * FROM `users`";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result))
                        echo '<span class="data-list">'.$row['email'].'</span>';
                        ?>
                    </div>
                    <div class="data joined">
                        <span class="data-title">Joined</span>
                        <?php
                        $sql = "SELECT * FROM `users`";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result))
                        echo '<span class="data-list">'.$row['joined_on'].'</span>';
                        ?>
                    </div>
                    <div class="data type">
                        <span class="data-title">Type</span>
                        <?php
                        $sql = "SELECT * FROM `users`";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result))
                        echo '<span class="data-list">'.$row['user_type'].'</span>';
                        ?>
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <?php
                        $sql = "SELECT * FROM `users`";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result))
                        echo '<span class="data-list">'.$row['user_status'].'</span>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>

</html>