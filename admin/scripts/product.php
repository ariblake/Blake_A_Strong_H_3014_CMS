<?php

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

function getSingleProduct($tbl, $col, $id){
    //TODO: finish the function based on getAll, this time only return one movie's fields
    $pdo = Database::getInstance()->getConnection();
    // $querySingle = 'SELECT * FROM '.$tbl.' WHERE '.$col.' = '.$id;
    $querySingle = "SELECT * FROM $tbl WHERE $col = $id";
    $results = $pdo->query($querySingle);

    if($results){
        return $results;
    }else{
        return 'There was a problem accessing this info';
    }
}

function addProduct($product){
    try{
        //Connect to the DB
        $pdo = Database::getInstance()->getConnection();

        //Validate the uploaded file
        $image = $product['image'];
        $upload_file = pathinfo($image['name']);
        $accepted_types = array('gif', 'jpg', 'jpeg', 'jpe', 'png', 'webp');

        //if file extension does not match any in $accepted_types
        if(!in_array($upload_file['extension'], $accepted_types)) {
            //display an error
            throw new Exception('Wrong file type');
        }

        //Move the uploaded file around (move from tmp path to the /images)
        $image_path = '../images/';

        //optional: randomize/hash file name before moving it over
        $generated_name = md5($upload_file['filename'].time());
        $generated_filename = $generated_name.'.'.$upload_file['extension'];
        $targetpath = $image_path.$generated_filename;

        if(!move_uploaded_file($image['tmp_name'],$targetpath)){
            throw new Exception('Failed to move uploaded file, check permission');
        }

        //insert into DB (tbl_movies as well as tbl_mov_genre)
        $insert_product_query = 'INSERT INTO tbl_products(product_name, product_description, product_image, product_price)';
        $insert_product_query .= 'VALUES(:product_name, :product_description, :product_image, :product_price)';

        $insert_product = $pdo->prepare($insert_product_query);
        $insert_product_result = $insert_product->execute(
            array(
                ':product_name'=>$product['name'],
                ':product_description'=>$product['description'],
                ':product_image'=>$generated_filename,
                ':product_price'=>$product['price'],
            )
        );

        $last_uploaded_id = $pdo->lastInsertId();
        if($insert_product_result && !empty($last_uploaded_id)){
            $update_category_query = 'INSERT INTO tbl_products_category(product_id, category_id) VALUES(:product_id, :category_id)';
            $update_category = $pdo->prepare($update_category_query);

            $update_category_result = $update_category->execute(
                array(
                    ':product_id' => $last_uploaded_id,
                    ':category_id' => $product['category'],
                )
            );
        }

        //If all of above works, redircct user to index.php
        redirect_to('index.php');

    }catch(Exception $e){
        //otherwise return error message
        $error = $e->getMessage();
        return $error;
    } 
}

function updateProduct($product){
    try{
        //set up database connection
        $pdo = Database::getInstance()->getConnection();

        //TODO: Run the proper SQL query to update tbl_user with the proper values
        $update_product_query = 'UPDATE tbl_products SET product_name = :product_name, product_description = :product_description, product_image =:product_image, product_price = :product_price WHERE product_id = :id)';
        $update_product_set = $pdo->prepare($update_product_query);
        $update_product_result = $update_product_set->execute(
            array(
                ':id'=>$product['id'],
                ':product_name'=>$product['name'],
                ':product_description'=>$product['description'],
                ':product_image'=>$product['image'],
                ':product_price'=>$product['price'],
            )
        );

        $current_product_id = $product['id'];
        if($update_product_result && !empty($current_product_id)){
            $update_category_query = 'UPDATE tbl_products_category SET category_id = :category_id WHERE product_id = :product_id';
            $update_category = $pdo->prepare($update_category_query);

            $update_category_result = $update_category->execute(
                array(
                    ':product_id' => $current_product_id,
                    ':category_id' => $product['category'],
                )
            );
        }

        redirect_to('index.php');

    }catch(Exception $e){
        //otherwise return error message
        $error = $e->getMessage();
        return $error;
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