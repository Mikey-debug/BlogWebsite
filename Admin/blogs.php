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
                    <i class="uil uil-blogger"></i>
                    <span class="text">Blogs</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Serial No</span>
                        <?php
                        $sql = "SELECT * FROM `blogs`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result))
                            echo '<span class="data-list">' . $row['sno'] . '</span>';
                        ?>
                    </div>
                    <div class="data names">
                        <span class="data-title">Title</span>
                        <?php
                        $sql = "SELECT * FROM `blogs`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result))
                            echo '<span class="data-list">' . $row['blog_title'] . '</span>';
                        ?>
                    </div>
                    <div class="data joined">
                        <span class="data-title">Published On</span>
                        <?php
                        $sql = "SELECT * FROM `blogs`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result))
                            echo '<span class="data-list">' . $row['published_at'] . '</span>';
                        ?>
                    </div>
                    <div class="data names action">
                        <span class="data-title">Action</span>
                        <?php
                        $sql = "SELECT * FROM `blogs`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result))
                            echo '<span class="data-list" style="margin-top: 10px; font-size:16px;"><a class="action-btn" href="/blog/admin/crud?delete_blog='.$row['sno'].'" target="_blank">Delete</a></span>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>

</html>