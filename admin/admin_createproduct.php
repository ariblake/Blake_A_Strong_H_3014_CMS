<?php
require_once '../load.php';
confirm_logged_in();

if(isset($_POST['submit'])){
    $name = trim($_POST['product_name']);
    $description = trim($_POST['product_description']);
    $price = trim($_POST['product_price']);
    $image = trim($_POST['product_image']);

    if(empty($name) || empty($description) || empty($price) || empty($image)){
        $message = 'Please fill out the required fields';
    }else{
        $message = createProduct($name, $description, $price, $image);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h2>Create Product</h2>
    <?php echo !empty($message)? $message: ''; ?>
    <form action="admin_createproduct.php" method="post">
        <label>Product Name</label>
        <input type="text" name="product_name" value=""><br><br>
        <label>Product Description</label>
        <input type="text" name="product_description" value=""><br><br>
        <label>Product Price</label>
        <input type="text" name="product_price" value=""><br><br>
        <label>Product Image</label>
        <input type="text" name="product_image" value=""><br><br>
        <button name="submit">Create Product</button>
    </form>
</body>
</html>