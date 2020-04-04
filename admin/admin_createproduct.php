<?php
require_once '../load.php';
confirm_logged_in();

$category_table = 'tbl_category';
$categories = getAll($category_table);

if(isset($_POST['submit'])){
    $product = array(
        'name' => trim($_POST['product_name']),
        'description' => trim($_POST['product_description']),
        'price' => trim($_POST['product_price']),
        'image' => $_FILES['product_image'],
        'category' => trim($_POST['product_category'])
    );

    $result = addProduct($product);
    $message = $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <h2>Create Product</h2>
    <?php echo !empty($message)? $message: ''; ?>
    <form action="admin_createproduct.php" method="post" enctype="multipart/form-data">
        <label>Product Name</label>
        <input type="text" name="product_name"><br><br>

        <label>Product Description</label>
        <input type="text" name="product_description"><br><br>

        <label>Product Price</label>
        <input type="text" name="product_price"><br><br>

        <label>Product Image</label>
        <input type="file" name="product_image"><br><br>

        <label>Product Category:</label><br>
        <select name="product_category">
            <option>Please select a category</option>
            <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?php echo $row['category_id'];?>"><?php echo $row['category'];?></option>
            <?php endwhile;?>
        </select><br><br>

        <button name="submit">Create Product</button>
    </form>
</body>
</html>