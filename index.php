<?php
require_once 'load.php';

// var_dump($getMovies);exit;

if(isset($_GET['filter'])) {
    //Filter movies by genre
    $args = array(
        'tbl'=>'tbl_products',
        'tbl2' =>'tbl_category',
        'tbl3'=>'tbl_products_category',
        'col'=>'product_id',
        'col2'=>'category_id',
        'col3'=>'category',
        'filter'=>$_GET['filter']
    );
    $getProducts = getProductsByFilter($args);
}else{
    $product_table = 'tbl_products';
    $getProducts = getAll($product_table);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sportchek CMS</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <main>
        <?php include 'templates/header.php';?>

        <div class="products">
        <?php while($row = $getProducts->fetch(PDO::FETCH_ASSOC)):?>
            <div class="product-item">
                <img src="images/<?php echo $row['product_image'];?>" alt="<?php echo $row['product_name'];?>" width=300px>
                <h2><?php echo $row['product_name'];?></h2>
                <p><?php echo $row['product_description'];?></p>
                <h4><?php echo $row['product_price'];?></h4>
                
            </div>
        <?php endwhile;?>
        </div>

        <?php include 'templates/footer.php';?>
    </main>
    
</body>
</html>