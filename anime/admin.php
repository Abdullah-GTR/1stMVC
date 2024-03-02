<?php
include("things/_nav.php");
include("things/_dbconnect.php");
 
$name = $_POST["name"];
$product_story = $_POST["product_story"];
$total_season = $_POST["total_season"];
$submit = $_POST["submit"];
//image work
$img = $_FILES["img"]["name"];
$tempfile = $_FILES["img"]["tmp_name"];
$filedata = "things/$img";

move_uploaded_file($tempfile, $filedata);



$sql = "INSERT INTO products (product_name,product_story,product_img,update_time,total_season) VALUES('$name', '$product_story', '$filedata', current_timestamp(), '$total_season')";
$result = mysqli_query($conn, $sql);
if(isset($_POST["submit"])){
    if($result){
        echo "Data Submitted";
    }else{
        echo "Kuch to garbar he";
    }

}else{
    echo"Press update Button";
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
                <label for="exampleInputEmail1" class="form-label" >Anime or Movie Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Short Story</label>
                <input type="text" class="form-control" name="product_story" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Total Seasons</label>
                <input type="text" class="form-control" name="total_season" >
            </div>
            <div class="img">
                <label for="exampleInputPassword1" class="form-label" >Choose Image</label>
                <input type="file" name="img" id="">
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>  
    </div>
    <div class="mb-3">
        <a href="items.php">Edit Items</a>

    </div>




</body>
</html>
