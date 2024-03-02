<?php
	include("things/_dbconnect.php");
	session_start();
	echo "user name: " . $_SESSION['username'];
	$sql = "select * from wishlistlist";
	$result = mysqli_query($conn, $sql);
	
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wishlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="wishlist1.css">
</head>
<body>
    <div class="container-fluid">
        <table>
            <tr>
                <th>Movie/Anime Name</th>
                <th>Story</th>
                <th>Total Season</th>
                <th>Operation</th>
                
            </tr>
            <?php
            while($data = mysqli_fetch_assoc($result)) {
              
            ?>
            <tr class="button-row">
                <td><?php echo  $data["product_name"] ?></td>
                <td><?php echo  $data["product_story"] ?></td>
                <td><?php echo  $data["total_season"] ?></td>
                <td><button type="submit" class="btn btn-primary" name="delete">Delete</button></td>
                
            </tr>
            <?php

}
            
            ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
