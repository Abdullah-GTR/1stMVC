<?php
include("things/_dbconnect.php");
session_start();
echo "<br>User Name is:" .$_SESSION['username'];

$sql = "SELECT s_id from users WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($conn, $sql);
if($result){
	$data = mysqli_fetch_assoc($result);
	echo "<br>User ID is:" . $data['s_id'];
}else{
	echo "hello";
}//getting Username and ID

//getting product id


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container justify-content-center">
        <form action="" method="POST">
            <video width="320" height="240" controls>
              <source src="Goku-blue.mp4" type="video/mp4">
              
            Your browser does not support the video tag.
            </video>
        </form>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>