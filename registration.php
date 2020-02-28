<?php include "db.php" ?>
<?php include "functions.php" ?>
 
<?php
if(isset($_POST['register'])){
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    $error = [
        'username' => '',
        'email' => '',
        'password' => ''
    ];

    if(strlen($username) < 4){
        $error['username'] = 'Username needs to be longer';
    }
    if($username ==''){
        $error['username'] = 'Username cannot be empty';
    }
    if(username_exists($username)){
        $error['username'] = 'Username already exists, pick another one';
    }
    if($email ==''){
        $error['email'] = 'Email cannot be empty';
    }
    if(email_exists($email)){
        $error['email'] = 'Email already exists, <a href="index.php">Please login</a>';
    }
    if($password ==''){
        $error['password'] = 'Password cannot be empty';
    } 

    foreach($error as $key => $value){
        if(empty($value)){
            unset($error[$key]);
         }
    }
    if(empty($error)){
        register_user($username, $email, $password);
        }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Document</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    <section>
        <div> 
         <div class="header">
            <h1>Register</h1>
         </div>
            <div >         
                <form role="form" class="form" action="registration.php" method="post" autocomplete="off">              
                    <div class="form-row">
                        <label for="username" >Username</label>
                        <input type="text" name="username" id="username"  placeholder="Enter Desired Username" autocomplete="on" 
                        value="<?php echo isset($username) ? $username : ''?>">
                        <p class="form-error"><?php echo isset($error['username']) ? $error['username'] : ''?></p>
                    </div>
                    <div class="form-row" >
                        <label for="email" >Email</label>
                        <input type="email" name="email" id="email"  placeholder="somebody@example.com" autocomplete="on" 
                        value="<?php echo isset($email) ? $email : ''?>">
                        <p class="form-error"><?php echo isset($error['email']) ? $error['email'] : ''?></p>
                    </div>
                    <div class="form-row">
                        <label for="password" >Password</label>
                        <input type="password" name="password" id="key"  placeholder="Password">
                        <p class="form-error"><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                    </div>
            
                    <button name="register" id="btn-login">Register</button>
                </form>            
            </div> 
        </div> 
    </section>    
</body>
</html>

 

    
    
    