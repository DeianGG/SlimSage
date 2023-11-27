<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'composer\vendor\autoload.php';

$servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "fatloss";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if(!$conn){
        die("Connection to database failed".mysql_connect_error());
    }

// Retrieve emails from the database (replace with your SQL query)
$result = mysqli_query($conn, "SELECT email FROM users");

$subject = "Exercitiu nou";
$message = "Un nou exercitiu a fost postat. Incearca-l acum!";
$fromEmail = "deian.ageu1@gmail.com";
$fromName = "FatLoss";

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'deian.ageu1@gmail.com';
    $mail->Password   = 'xwoa rntc imdn eees';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    // Recipients
    $mail->setFrom($fromEmail, $fromName);

    // Loop through the results and add recipients
    while ($row = mysqli_fetch_assoc($result)) {
        $to = $row['email'];
        $mail->addAddress($to);
    }

    // Content
    $mail->Subject = $subject;
    $mail->Body    = $message;

    // Send email
    $mail->send();

    echo 'Emails sent successfully';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Close the database connection
mysqli_close($conn);
?>