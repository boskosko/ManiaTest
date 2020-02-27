<?php  include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Document</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    <section id="login">
        <div> 
         <div class="header">
            <h1>Login</h1>
         </div>
            <div >         
                <form role="form" class="form" action="./includes/login.php" method="post" autocomplete="off">              
                    <div class="form-row" >
                        <label for="email" >Email</label>
                        <input type="email" name="email" id="email"  placeholder="somebody@example.com">
                    </div>
                    <div class="form-row">
                        <label for="password" >Password</label>
                        <input type="password" name="password" id="key"  placeholder="Password">
                    </div>
                    <a href="./registration.php">Register</a>
                    <button name="login">Login</button>
                </form>            
            </div> 
        </div> 
    </section>  
</body>
</html>

 

    
    
    