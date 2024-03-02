<?php
include("things/_nav.php");
include("things/_dbconnect.php");
session_start();

if(isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    echo "Product ID: " . $productId . "<br>";  
} else {
    echo "Product ID not provided.";
}

$productId = $_POST['product_id'];
$newproduct = $_POST["newname"];
$newstory = $_POST["new_story"];
$newseason = $_POST["newtotal_season"];
$newimg = $_POST['newimg'];

$tempfile = $_FILES["newimg"]["tmp_name"];
$filedata = "things/$newimg";

move_uploaded_file($tempfile, $filedata);

if(isset($_POST["submit"])){
    $updatesql = "UPDATE products
    SET product_name = '$newproduct', product_story = '$newstory', product_img = '$filedata', 
    total_season = '$newseason'
    WHERE p_id = '$productId'";
    if(mysqli_query($conn, $updatesql)){
         echo "Product updated successfully.";
    }else{
         echo "Product not updated successfully.";
    }

}





?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anime Watch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin.css">
  </head>
  <body>
    <div class="container justify-content-center">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">New Anime or Movie Name</label>
                <input type="text" class="form-control" name="newname" id="exampleInputEmail1" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >New Short Story</label>
                <input type="text" class="form-control" name="new_story" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >New Total Seasons</label>
                <input type="text" class="form-control" name="newtotal_season" >
            </div>
            <div class="img">
                <label for="exampleInputPassword1" class="form-label" >Choose New Image</label>
                <input type="file" name="newimg" id="">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>  
        </div>
    




</body>
</html>
