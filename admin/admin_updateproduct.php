<?php
    // usually do these for all our pages that start with the admin_ prefix
    // we don't have to do these for the ones in the script folder because they are already being loaded in load.php
    require_once '../load.php';
    confirm_logged_in();

    $category_table = 'tbl_category';
    $categories = getAll($category_table);

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $tbl = 'tbl_products';
        $col = 'product_id';
        $getProduct = getSingleProduct($tbl, $col, $id);

        if(isset($_POST['submit'])){
            $product = array(
                'id' => $id,
                'name' => trim($_POST['product_name']),
                'description' => trim($_POST['product_description']),
                'price' => trim($_POST['product_price']),
                'image' => $_FILES['product_image'],
                'category' => trim($_POST['product_category'])
            );
        
            $result = updateProduct($product);
            $message = $result;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <h2>Update Product</h2>
    <!--  -->
    <?php if(!is_string($getProduct)):?>
        <?php while($row = $getProduct->fetch(PDO::FETCH_ASSOC)):?>
            <form action="admin_updateproduct.php" method="post" enctype="multipart/form-data">
                <label>Product Name:</label>
                <input type="text" name="product_name" value="<?php echo $row['product_name'];?>"><br><br>

                <label>Product Description:</label>
                <textarea name="product_description"><?php echo $row['product_description'];?></textarea><br><br>

                <label>Product Price:</label>
                <input type="text" name="product_price" value="<?php echo $row['product_price'];?>"><br><br>

                <label>Product Image:</label>
                <input type="file" name="product_image" value="<?php echo $row['product_image'];?>"><br><br>

                <label>Product Category:</label><br>
                <select name="product_category">
                    <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)): ?>
                        <option value="<?php echo $row['category_id'];?>"><?php echo $row['category'];?></option>
                    <?php endwhile;?>
                </select><br><br>

                <button type="submit" name="submit">Update Product</button>
            </form>

            <a href="index.php">Back to Home</a>
        <?php endwhile;?>
    <?php endif;?>


    
</body>
</html>