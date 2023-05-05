<?php require "partials/_dbconnect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog : Homepage</title>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">

</head>

<body>
    <?php require "partials/_nav.php"; ?>

    <header class="header">
        <div class="content">
            <h1 class="heading">
                <span class="small">welcome in the world of</span>
                blog
                <span class="no-fill">writing</span>
            </h1>
            <a href="/blog/editor" class="btn">write a blog</a>
        </div>
    </header>

    <!-- blog section -->
    <section class="blogs-section">
        <?php
        $sql = "SELECT * FROM `blogs`;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="blog-card">
                <img src=" uploads/' . $row['banner_img'] . ' " class="blog-image" alt="">
                <h1 class="blog-title"> ' . $row['blog_title'] . ' </h1>
                <p class="blog-overview"> ' . $row['blog_description'] . ' </p>
                <a href="/blog/blogpost?blog=' . $row['blog_slug'] . '" target="_blank" class="btn dark">read</a>
            </div>';
        }
        ?>
    </section>

    <?php require "partials/_footer.php" ?>

</body>
</html>