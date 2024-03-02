<?php
    $server = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "watch";

    $conn = mysqli_connect($server, $username, $pass, $dbname);

    if($conn){
        echo "connect";

    }
    else{
        die("Error".  mysqli_connect_error());
    }

?>