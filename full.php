<?php 
include 'config.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Use Statements
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;




$conn = new mysqli($host, $username, $password, $dbname);

$sql = "SELECT email FROM email_notififationsystem";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'justinscottmiller0@gmail.com';
            $mail->Password   = 'xvjhllpkhwowuukx';                               // SMTP password
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;     
            
            // TCP port to connect to
            $mail->setFrom('justinscottmiller0@gmail.com', 'Mailer');
            $mail->addAddress($row['email']);     // Add a recipient
            $mail->addReplyTo('justinscottmiller0@gmail.com', 'Information');
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'this is a test email';
            $mail->Body    = 'this is a test email';
            $mail->AltBody = 'this is a test email';
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
} else {
    echo "0 results";
}


?>