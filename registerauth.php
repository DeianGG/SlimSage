<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'composer\vendor\autoload.php';
if (isset($_POST['signup-submit'])) {
    include('connection.php');

    

    function sendver($email, $token){


        $mail = new PHPMailer(true);                
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'deian.ageu1@gmail.com';                     //SMTP username
            $mail->Password   = 'xwoa rntc imdn eees';                               //SMTP password
            $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $mail->setFrom('deian.ageu1@example.com', 'SlimSage');
            $mail->addAddress($email);

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Confirmati adresa de email - Slim Sage';
            $mail->Body    = "<h2>Confirmati adresa de email apasand pe link-ul de mai jos</h2><br/><br/><a href='http://localhost/verifymail.php?token=$token'>Apasati aici</a>";

            $mail->send();
    }
    
    $password = $_POST['password'];
    $email = $_POST['email'];
    $token = md5(rand());

    sendver("$email", "$token");


        $sql = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: register.php?error=sqlerror");
        exit();
    }

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header("Location: register.php?error=emailtaken");
                exit();
            } else {
                $sql = "INSERT INTO users (email, password, permission, token, verified) VALUES (?, ?, 0, ?, 0)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: register.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPwd, $token);
                    mysqli_stmt_execute($stmt);

                    $_SESSION['loggedin']=true;
                    $_SESSION['email']=$email;
                    $_SESSION['permission'] = 0;
                    $_SESSION['verified']=false;

                    header("Location: index.php");
                    exit();
                }
            }
        
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: register.php");
    exit();
}
?>
