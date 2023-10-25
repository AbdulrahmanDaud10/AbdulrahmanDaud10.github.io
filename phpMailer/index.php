
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if(isset($_POST['send'])){
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $subject = htmlentities($_POST['subject']);
    $message = htmlentities($_POST['message']);

    $GooglePassword = getenv('GOOGLE_APP_PASSWORD');//returns: localhost

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'daudabdulrahman22@gmail.com';
    $mail->Password = ($GooglePassword);
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);                //Set email format to HTML
    $mail->setFrom($email, $name);
    $mail->addAddress('daudabdulrahman22@gmail.com');
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $message;
    $mail->send();
    echo 'Message has been sent';
}
?>