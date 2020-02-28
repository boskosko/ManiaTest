

<?php


function confirmQuery($result){
    global $con;
    if(!$result) {
        die("QUERY FAILED ." . mysqli_error($con));
    }   
}


function username_exists($username){
    global $con;
    $query ="SELECT user FROM users WHERE user = '$username'";
    $result = mysqli_query($con, $query);
    confirmQuery($result);
    if(mysqli_num_rows($result) > 0){    
        return true;   
    } else {
        return false;
    }
}


function email_exists($email){
    global $con;
    $query ="SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    confirmQuery($result);
    if(mysqli_num_rows($result) > 0){    
        return true;   
    } else {
        return false;
    }
}

function register_user($username, $email, $password){
    global $con;

        $username = mysqli_real_escape_string($con, $username);
        $email    = mysqli_real_escape_string($con,$email);
        $password = mysqli_real_escape_string($con,$password);
    
        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12) ); 
   
        $query = "INSERT INTO users (user, email, password) ";
        $query .= "VALUES('{$username}','{$email}','{$password}' )";

        $register_user_query=mysqli_query($con,$query);
        confirmQuery($register_user_query);
        header("Location: index.php");
    
}

function login_user($email, $password){
    global $con;
        $email    = trim($email);
        $password = trim($password);       
        $email    = mysqli_real_escape_string($con,$email);
        $password = mysqli_real_escape_string($con,$password);

        $query = "SELECT * FROM users where email = '{$email}'";
        $select_user_query = mysqli_query($con,$query);
        if(!$select_user_query){

            die("QUERY FAILED" . mysqli_error($con));

        }

        while($row = mysqli_fetch_array($select_user_query)){
        $db_id = $row['id'];
        $db_email = $row['email'];
        $db_username = $row['user'];
        $db_password = $row['password'];
        $db_is_admin = $row['is_admin'];
        }
        if(password_verify($password, $db_password)){
            $_SESSION['user'] = $db_username;  
            $_SESSION['is_admin'] = $db_is_admin;
            $_SESSION['id'] = $db_id;  

            header("Location: ../contact.php");

            } else {
           header("Location: ../index.php");
        }
 }


function getCurrentUser(){
    session_start();
    $userid = $_SESSION['id'];

    return $userid;
}


function isUserAdmin($id)
{
    global $con;
    $status = 0;

    $sql = "SELECT is_admin FROM users where id=$id; ";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $status = $row['is_admin'];
    }
    return $status;
}

?>



