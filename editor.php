<?php require "partials/_dbconnect.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog : Editor</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/editor.css">

</head>

<body>
    <form action="/blog/editor" method="POST" enctype="multipart/form-data">
        <div class="banner">
            <input type="file" accept="image/*" id="banner-upload" name="banner-img" hidden>
            <label for="banner-upload" class="banner-upload-btn"><img src="img/upload.png" alt="upload banner"></label>
        </div>

        <div class="blog">
            <textarea type="text" class="title" placeholder="Blog title..." name="blog-title"></textarea>
            <textarea type="text" class="article" placeholder="Start writing here..." name="blog-desc"></textarea>
        </div>

        <div class="blog-options">
            <button type="submit" class="btn dark publish-btn">publish</button>
            <input type="file" accept="image/*" id="image-upload" hidden>
            <label for="image-upload" class="btn grey upload-btn" style="pointer-events: none;">Upload Image</label>
        </div>
    </form>

</body>
</html>

<?php 

$file_err = $blog_title_err = $blog_desc_err = "";
$banner_img = "";
$blog_title = "";
$blog_desc = "";



// echo $fileName . "," . $targetFilePath;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_FILES['banner-img']) && !empty(trim($_FILES['banner-img']['name']))){
        // File upload path
        $targetDir = "uploads/";
        $fileName = $_FILES["banner-img"]["name"];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        // echo $fileType;
        $allowTypes = array('jpg','png','jpeg', 'jfif');

        if(in_array($fileType, $allowTypes)){
            // echo "File Supported";
            // Upload file to uploads/
            if(move_uploaded_file($_FILES["banner-img"]["tmp_name"], $targetFilePath)){
                $banner_img = trim($fileName);
            }
            else{
                $file_err = "Sorry, There was an error uploading a file";
            }
        }
        else{
            $file_err = "This File is not supported. Only 'jpg','png','jpeg', 'jfif' are allowed";
        }
    }
    else{
        $file_err = "Please Upload A file";
    }

    // Check for blog title & description
    if(isset($_POST['blog-title']) && !empty(trim($_POST['blog-title']))){
        $blog_title = $_POST['blog-title'];
    }
    else{
        $blog_title_err = "Blog title Cannot be empty";
    }
    if(isset($_POST['blog-desc']) && !empty(trim($_POST['blog-desc']))){
        $blog_desc = $_POST['blog-desc'];
    }
    else{
        $blog_desc_err = "Blog description Cannot be empty";
    }
    
    if(empty($file_err) && empty($blog_title_err) && empty($blog_desc_err)){
        $blog_slug = str_replace(" ", "-", $blog_title);
        $sql = "INSERT INTO `blogs` (`sno`, `blog_title`, `blog_description`, `blog_slug`, `banner_img`, `published_at`) VALUES (NULL, '".$blog_title."', '". $blog_desc ."', '".$blog_slug." ',  '". $banner_img." ', current_timestamp());";

        $result = mysqli_query($conn, $sql);

        if($result){
            
        }
    }


}

// echo $file_err;
// echo "<br>";
// echo $blog_title;
// echo "<br>";
// echo $blog_desc;
// echo "<br>";
// echo $banner_img;

?>
