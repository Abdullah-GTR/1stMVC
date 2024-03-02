<?php
include("things/_nav.php");
include("things/_dbconnect.php");


//starting work Add to Wish List
session_start();

echo $_SESSION['username'];
$getusersql = "SELECT s_id from users WHERE username = '{$_SESSION['username']}'";
$getuserresult = mysqli_query($conn, $getusersql);
if($getuserresult){
    $data = mysqli_fetch_assoc($getuserresult);
    echo "user id is: ". $data["s_id"];
}else{
    echo"do it again";
}

$sql = "select * from products";
$result = mysqli_query($conn, $sql);
// $data = mysqli_fetch_assoc($result);
// echo $data['product_name'];

if(isset($_POST['addtowishlist'])){
    $productname = $_POST['productname'];
    $productstory = $_POST['productstory'];
    $totalseason = $_POST['totalseason'];
    $insertwishlist ="INSERT INTO `wishlistlist` (`product_name`, `product_story`, `total_season`, `user_id`) VALUES ('$productname', '$productstory', '$totalseason', '{$_SESSION['username']}')";
    
    $result1 = mysqli_query($conn, $insertwishlist);
    
    if($result1){
        echo "Inserted";    
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
else{
    echo "string";
}//End of work Add to Wish List


//starting work Watch Now

if(isset($_POST["watchnow"])){
    header("location: watchnow.php");
}
else
{
    echo "<br> stay here";
}
//End work Watch Now
//getting the the product ID
$productidsql = "Select p_id from products Where "




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home1.css">
</head>
<body>


<?php
while($data = mysqli_fetch_assoc($result)){
?>
<div class="product">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card" style="width: 28rem;">
                <img src="<?php  echo $data["product_img"]?>" class="card-img-top" alt="...">
                <div class="card-body" >
                    <h5 class="card-title"><?php echo $data['product_name']; ?></h5>
                    <p class="card-text"><?php echo $data['product_story']; ?></p>
                    <p class="card-text"><?php echo $data['total_season']; ?></p>



                    <input type="hidden" class="" name="productname" value="<?php echo $data['product_name'] ?>">

                    <input type="hidden" class="" name="productstory" value="<?php echo $data['product_story'] ?>">
                    <input type="hidden" class="" name="totalseason" value="<?php echo $data['total_season'] ?>">


                    <button type="submit" class="btn btn-primary" name="watchnow">Watch Now</button>
                    <button type="submit" class="btn btn-primary" name="addtowishlist">Add to Wishlist</button>

<br>
                </div>
            </div>
        </form>
    </div>
    <br>
    <?php
}//while loop end overhere
    ?>
</body>
</html>