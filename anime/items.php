<?php
include("things/_dbconnect.php");
session_start();

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Check if the form is submitted
if(isset($_POST['update'])) {
    // Fetch the product details for the selected product ID
    $productId = $_POST['update'];
    $fetchProductSql = "SELECT * FROM products WHERE p_id = $productId";
    $productResult = mysqli_query($conn, $fetchProductSql);

    if($data = mysqli_fetch_assoc($productResult)) {
        // Set the product details in the session
        $_SESSION['product_id'] = $data['p_id'];

        // For testing, print the product ID
        echo "Product ID: " . $data['p_id'];
    } else {
        // Handle the case where the product with the provided ID is not found
        echo "Product not found.";
    }
}

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
        <form action="" method="POST" enctype="multipart/form-data">
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
                    <td><?php echo $data["product_name"] ?></td>
                    <td><?php echo $data["product_story"] ?></td>
                    <td><?php echo $data["total_season"] ?></td>
                    <input type="hidden" name="product_id" value="<?php echo $data["p_id"]; ?>">
                     <td><button type="submit" class="btn btn-primary" name="update" value="<?php echo $data["p_id"]; ?>">Update</button></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <?php
    // Check if the session variable is set and perform the redirection using JavaScript
    if(isset($_SESSION['product_id'])) {
        echo '<script>window.location.href="update.php?product_id='.$_SESSION['product_id'].'";</script>';
        unset($_SESSION['product_id']); // Unset the session variable to avoid multiple redirects
    }
    ?>
</body>
</html>
