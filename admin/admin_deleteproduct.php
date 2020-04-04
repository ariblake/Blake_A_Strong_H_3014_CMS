<?php
    require_once '../load.php';
    confirm_logged_in();

    $products = getAllProducts();
    if(!$products){
        $message = 'Failed to get product list';
    }

    if(isset($_GET['id'])){
        $product_id = $_GET['id'];
        $delete_result = deleteProduct($product_id);

        if(!$delete_result){
            $message = 'Failed to delete product';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update or Delete Products</title>
</head>
<body>
    <h2>Update or Delete Products</h2>
    <?php echo !empty($message)? $message : '';?>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php while($product = $products->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $product['product_name'];?></td>
                <td><?php echo $product['product_price'];?></td>
                <td><?php echo $product['product_image'];?></td>
                <td><a href="admin_updateproduct.php?id=<?php echo $product['product_id'];?>">Update</a></td>
                <td><a href="admin_deleteproduct.php?id=<?php echo $product['product_id'];?>">Delete</a></td>
                <?php endwhile;?>
            </tr>
        </tbody>
    </table>
</body>
</html>