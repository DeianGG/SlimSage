<?php
session_start();

if (isset($_POST['signup-submit'])) {
    require 'connection.php';

    $password = $_POST['password'];
    $email = $_POST['email'];

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
                $sql = "INSERT INTO users (email, password, permission) VALUES (?, ?, 0 )";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: register.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);

                    $_SESSION['loggedin']=true;
                    $_SESSION['email']=$email;
                    $_SESSION['permission'] = 0;

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