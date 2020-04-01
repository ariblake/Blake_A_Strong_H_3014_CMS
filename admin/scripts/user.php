<?php
function createUser($fname, $username, $password, $email){
    $pdo = Database::getInstance()->getConnection();

    //TODO: finish the below so that it can run a SQL query to create a new user with provided data
    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email, user_ip)';
    $create_user_query .= ' VALUES (:fname, :username, :password, :email, "no")';

    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result= $create_user_set->execute(
        array(
            ':fname'=>$fname,
            ':username'=>$username,
            ':password'=>$password,
            ':email'=>$email,
        )
    );
    //TODO: redirect to index.php if create user successfully, otherwise return an error message
    if($create_user_result){
        redirect_to('index.php');
    }else{
        return 'The user did not go through';
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

function getAllUsers(){
    $pdo = Database::getInstance()->getConnection();

    $get_all_query = 'SELECT * FROM tbl_user';
    $get_users_result = $pdo->query($get_all_query);

    //TODO: if the execution is successful, return the user data, otherwise return an error message
    if($get_users_result){
        return $get_users_result;
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

function deleteUser($id){
    //TODO: finish the function to delete the given user
    $pdo = Database::getInstance()->getConnection();

    $delete_user_query = 'DELETE FROM tbl_user WHERE user_id = :id';
    $delete_user_set = $pdo->prepare($delete_user_query);
    $delete_user_result = $delete_user_set->execute(
        array(
            ':id'=>$id,
        )
    );

    // If everything went through, redirect to admin_deleteuser.php
    // otherwise, return false
    //row count tells us how many rows are being affected by our sql query - we want to make sure it is actually affecting a user (could also do === 1)
    if($delete_user_result && $delete_user_set->rowCount() > 0){
        redirect_to('admin_deleteuser.php');
    }else{
        return false;
    }
}
    
    