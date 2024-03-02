<?php
    include "things/_nav.php";
    include "things/_dbconnect.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
  if(isset($_POST["submit"])){
    if($username === "admin" && $password === "pakistan"){
      header("location: admin.php");
      
    }//if condition is finish
    else if($username !== "admin" && $password === "pakistan"){
        echo "<div class='alert alert-danger' role='alert'>
        Check the Username is correct or Not if You Want Admin Panel...
             </div>";
    }//esle if condition is finished
    else if($username === "admin" && $password !== "pakistan"){
      echo "<div class='alert alert-danger' role='alert'>
             Check the Password is correct or Not if You Want Admin Panel ...
           </div>";
    }//esle if condition is finished
    else{
        $sql1 = "select * from users where username ='$username' and password = '$password'";
        $result = mysqli_query($conn, $sql1);
        $num = mysqli_num_rows($result);
        if($num == 1){
          
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $username;
          header("location: home.php");
        }else{
        echo "invalid";}//nested esle condition is finished

    }//esle condition is finished

    }//Main if condition"for Submit Button"  finished
  

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
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>