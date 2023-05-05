<?php
require "../partials/_dbconnect.php";

// Defining important variable
$blog_slug = $_GET['blog'];
$err = "";
$blog_slug_name = str_replace("-", " ", $blog_slug);

// echo $blog_slug;

// If blog slug is not empty
if (!empty($blog_slug)) {
    $sql = "SELECT * FROM blogs WHERE blog_title='$blog_slug_name'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $blog_title = $row['blog_title'];
        $blog_desc = $row['blog_description'];
        $banner_img = $row['banner_img'];
        $published_at = $row['published_at'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog : <?php echo $blog_title; ?></title>

    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/editor.css">
    <link rel="stylesheet" href="../css/blog.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>

<body>

    <div class="banner" style="background-image: url('../uploads/<?php echo $banner_img; ?>');"></div>

    <div class="blog">
        <h1 class="title"><?php echo $blog_title; ?></h1>
        <p class="published"><span>published at - <?php echo $published_at; ?></span></p>
        <div class="article">
            <?php echo $blog_desc; ?>
        </div>
    </div>

    <h1 class="sub-heading">Read more</h1>

    <!-- blog section -->
    <section class="blogs-section">
        <?php
        $sql = "SELECT * FROM `blogs`;";
        $result = mysqli_query($conn, $sql);
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $url = str_replace(" ", "-", $row['blog_title']);
            echo '<div class="blog-card">
                <img src=" ../uploads/' . $row['banner_img'] . ' " class="blog-image" alt="">
                <h1 class="blog-title"> ' . $row['blog_title'] . ' </h1>
                <p class="blog-overview"> ' . $row['blog_description'] . ' </p>
                <a href="/blog/blogpost?blog=' . $url . ' " target="_blank" class="btn dark">read</a>
            </div>';

            // This jugad is for printing only 4 blogs
            if ($i == 3) {
                break;
            }
            $i += 1;
        }
        ?>
    </section>


<?php require "../partials/_footer.php" ?>
</body>

</html>