<?php
    // usually do these for all our pages that start with the admin_ prefix
    // we don't have to do these for the ones in the script folder because they are already being loaded in load.php
    require_once '../load.php';
    confirm_logged_in();

    $id = $_SESSION['user_id'];
    $user = getSingleUser($id);

    if(is_string($user)){
        $message = $user;
    }

    if(isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        $message = editUser($id, $fname, $username, $password, $email);
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
    <?php echo !empty($message)? $message : '';?>
    <form action="admin_updateproduct.php" method="post">
        <?php while($info = $user->fetch(PDO::FETCH_ASSOC)): ?>
        <label>Product Name:</label>
        <input type="text" name="fname" value="<?php echo $info['user_fname'];?>"><br><br>

        <label>Product Description:</label>
        <input type="text" name="username" value="<?php echo $info['user_name'];?>"><br><br>

        <label>Product Price:</label>
        <input type="text" name="password" value="<?php echo $info['user_pass'];?>"><br><br>

        <label>Product Image:</label>
        <input type="text" name="email" value="<?php echo $info['user_email'];?>"><br><br>

        <?php endwhile;?>
        <button type="submit" name="submit">Update Product</button>
    </form>
</body>
</html>