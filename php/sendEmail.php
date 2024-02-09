<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require "vendor/autoload.php";


// if(isset($_POST['name']) && isset($_POST['email'])){
    $name = 'Abdul';
    $email ='mirajabdulrahmandaud@gmail.com';
    $subject ='Test';
    $body = 'Checker';

    // Example use of getenv()
    $password = getenv('GOOGLE_PASSWORD');

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "daudabdulrahman22@gmail.com";
    $mail->Password = $password;
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";
    $mail->SMTPDebug = 1;

    //email settings
    $mail->isHTML(true);
    $mail->setFrom("daudabdulrahman22@gmail.com", "Abdul");
    $mail->addAddress("daudabdulrahman22@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
// }

?>