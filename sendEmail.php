<?php include "db.php"; ?>
<?php session_start(); ?>
<?php include "functions.php"; ?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit'])){

    $name = $_POST['username'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $content = $_POST['content'];
 
  
    $db_user = getCurrentUser();
    
    $db_title = trim($_POST['title']);
    $db_content = trim($_POST['content']);
    $db_title = mysqli_real_escape_string($con, $db_title);
    $db_content    = mysqli_real_escape_string($con,$db_content);
    
    $query = "INSERT INTO emails (user_id, title, content) ";
    $query .= "VALUES('{$db_user}', '{$db_title}','{$db_content}' )";
    $send_email_query=mysqli_query($con,$query);
    confirmQuery($send_email_query);

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );


    $mail->SMTPDebug = 0;                                   // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'boskoskoric111@gmail.com';                     // SMTP username
    $mail->Password   = 'propalitet1';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; //465
    $mail->SMTPSecure = "tls";                                  // TCP port to connect to

    //Recipients
    $mail->setFrom('bole@gmail.com', $name);
    $mail->addAddress($email, 'Joe User');     // Add a recipient
  

    // Attachments

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $title;
    $mail->Body    = $content;
   

    $mail->send();
    header("Location: contact.php");
    $_SESSION['email_sent'] = 'Message has been sent';
} catch (Exception $e) {
    header("Location: contact.php");
    $_SESSION['email_failed'] = 'Message has not been sent';
}}
else{
    echo "Message not sent";
}
