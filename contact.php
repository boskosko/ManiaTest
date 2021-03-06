<?php  include "db.php"; ?>
<?php session_start(); ?>
<?php include "functions.php"; ?>


<?php 
if(!isset($_SESSION['is_admin'])){
header("Location: index.php");
} 
?>

<?php 
$notification_message = '';
//$notification_name  = '';
//$notification_email = '';
//$notification_title = '';
//$notification_content = '';

$expire = 1;
$time = time() + $expire;
$session_life = time() - $time;
if(isset($_SESSION['email_sent'])){
    $notification_message = $_SESSION['email_sent'];   
    $status = "alert_success";
} 
if(isset($_SESSION['email_failed'])){
    $notification_message = $_SESSION['email_failed'];
//    $notification_name  = $_SESSION['email_failed_name'];
//    $notification_email = $_SESSION['email_failed_email'];
//    $notification_title = $_SESSION['email_failed_title'];
//    $notification_content = $_SESSION['email_failed_content'];
    $status = "alert_failed";
}
if(isset($_SESSION['email_sent']) || isset($_SESSION['email_failed'])){
    if(time() - $session_life > 3){
        unset($_SESSION['email_sent']);
        unset($_SESSION['email_failed']);
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
    <section id="login">
        <div> 
         <div class="header">
            <h1>Send email</h1>
            <a class="admin" href="admin.php">Go to admin panel</a>
         </div>
            <div >         
                <form role="form" class="form" action="sendEmail.php" method="post">                                
                   <h1>Welcome <small><?php echo $_SESSION['user']; ?></small></h1>
                    <div class="form-row" >
                        <label for="username" >Username</label>
                        <input type="text" name="username" id="username"  placeholder="Username" >
<!--                        <p class="alert --><?php //echo $status?><!--">--><?php //echo $notification_name ?><!--</p>-->
                    </div>            
                    <div class="form-row" >
                        <label for="email" >Email</label>
                        <input type="email" name="email" id="email"  placeholder="somebody@example.com">
<!--                        <p class="alert --><?php //echo $status?><!--">--><?php //echo $notification_email; ?><!--</p>-->
                    </div> 
                    <div class="form-row" >
                        <label for="title" >Title</label>
                        <input type="text" name="title" id="title"  placeholder="Title">
<!--                        <p class="alert --><?php //echo $status?><!--">--><?php //echo $notification_title; ?><!--</p>-->
                    </div>
                    <div class="form-row">
                        <label for="content" >Content</label>
                        <input type="text" name="content" id="content"  placeholder="Content">
<!--                        <p class="alert --><?php //echo $status?><!--">--><?php //echo $notification_content; ?><!--</p>-->
                    </div>
                    <a href="./includes/logout.php">Log out</a>
                    <button type="submit" name="submit">Send email</button>
                  <p class="alert <?php echo $status?>"><?php echo $notification_message; ?></p>
                </form>            
            </div> 
        </div> 
    </section>  
</body>
</html>

 

    
    
    