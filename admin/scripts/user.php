<?php
function createProduct($name, $description, $price, $image){
    $pdo = Database::getInstance()->getConnection();

    //TODO: finish the below so that it can run a SQL query to create a new user with provided data
    $create_product_query = 'INSERT INTO tbl_products(product_name, product_description, product_price, product_image)';
    $create_product_query .= ' VALUES (:name, :description, :price, :image)';

    $create_product_set = $pdo->prepare($create_product_query);
    $create_product_result= $create_product_set->execute(
        array(
            ':name'=>$name,
            ':description'=>$description,
            ':price'=>$price,
            ':image'=>$image,
        )
    );
    //TODO: redirect to index.php if create user successfully, otherwise return an error message
    if($create_product_result){
        redirect_to('index.php');
    }else{
        return 'The product did not go through';
    }

}

function getSingleUser($id){
    $pdo = Database::getInstance()->getConnection();
    //TODO: execute the proprt SQL query to fetch the user data whose user_id = $id
    $get_user_query = 'SELECT * FROM tbl_user WHERE user_id = :id';
    $get_user_set = $pdo->prepare($get_user_query);
    $get_user_result = $get_user_set->execute(
        array(
            ':id'=>$id,
        )
    );

    //TODO: if the execution is successful, return the user data, otherwise return an error message
    if($get_user_result){
        return $get_user_set;
    }else{
        return 'There was a problem accessing the user';
    }
}

function getAllProducts(){
    $pdo = Database::getInstance()->getConnection();

    $get_all_query = 'SELECT * FROM tbl_products';
    $get_products_result = $pdo->query($get_all_query);

    //TODO: if the execution is successful, return the user data, otherwise return an error message
    if($get_products_result){
        return $get_products_result;
    }else{
        return false;
    }
}

function editUser($id, $fname, $username, $password, $email){
    //TODO: set up database connection
    $pdo = Database::getInstance()->getConnection();

    //TODO: Run the proper SQL query to update tbl_user with the proper values
    $update_user_query = 'UPDATE tbl_user SET user_fname = :fname, user_name = :username, user_pass = :password, user_email = :email WHERE user_id = :id';

    $update_user_set = $pdo->prepare($update_user_query);
    $update_user_result = $update_user_set->execute(
        array(
            ':id'=>$id,
            ':fname'=>$fname,
            ':username'=>$username,
            ':password'=>$password,
            ':email'=>$email,
        )
    );

    //These lines can be used for debugging:
    //echo $update_user_set->debugDumpParams();
    //exit;

    //TODO: if everything goes well, redirect user to index.php
    // otherwise, return some error message
    if($update_user_result){
        redirect_to('index.php');
    }else{
        return 'The user did not update';
    }
}

function deleteProduct($id){
    //TODO: finish the function to delete the given user
    $pdo = Database::getInstance()->getConnection();

    $delete_product_query = 'DELETE FROM tbl_products WHERE product_id = :id';
    $delete_product_set = $pdo->prepare($delete_product_query);
    $delete_product_result = $delete_product_set->execute(
        array(
            ':id'=>$id,
        )
    );

    // If everything went through, redirect to admin_deleteuser.php
    // otherwise, return false
    //row count tells us how many rows are being affected by our sql query - we want to make sure it is actually affecting a user (could also do === 1)
    if($delete_product_result && $delete_product_set->rowCount() > 0){
        redirect_to('admin_deleteproduct.php');
    }else{
        return false;
    }
}
    
    