<?php
//error_reporting(E_ALL ^ E_WARNING); 
    include "things/_dbconnect.php";
    include "things/_nav.php";
    $userexists = "";
    $passmatch = "";



    $username = $_POST["username"] ;
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    



    $sqlexist = "SELECT username FROM users WHERE username = '$username'";
    $existresult = mysqli_query($conn, $sqlexist);
    $numexist = mysqli_num_rows($existresult);
    if(isset($_POST["submit"])){
        if($numexist > 0) {
            echo "<div class='alert alert-danger' role='alert'>
               Try to Use Different Username!!!
             </div>";
        } else {
            if($password == $cpassword) {
                // Hash the password before storing it in the database
                //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
                // Insert the new user into the database
                $sql = "INSERT INTO users (username, password, dateofsingin) VALUES ('$username', '$password', current_timestamp())";
                $result = mysqli_query($conn, $sql);
    
                if($result) {
                    echo "Inserted";
                    header("location: login.php");
                } else {
                    echo "alert('not inserted')";
                }
            } else {
               //echo "<script>alert('password not match')</script>";
               echo "<div class='alert alert-danger' role='alert'>
               Password Not Match You Have to Check The Password!!!
             </div>";
            }
        }
    }
    // else{
    //     echo "<div class='alert alert-danger' role='alert'>
    //            Password Not Match You Have to Check The Password!!!
    //          </div>";
    //}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anime Watch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container justify-content-center">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" >Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Username will be unique</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" id="exampleInputPassword1">
            </div>
            
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>  
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>