<?php
    session_start();
    include('connection.php');
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        $sql = "SELECT token, verified FROM users WHERE token=? LIMIT 1";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: register.php?error=sqlerror");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $token);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            mysqli_stmt_bind_result($stmt, $dbToken, $dbVerified);
            mysqli_stmt_fetch($stmt);
            if($dbVerified == 0){
                $updateSql = "UPDATE users SET verified=1 WHERE token=?";
                $updateStmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($updateStmt, $updateSql)) {
                    header("Location: register.php?error=updateerror");
                    exit();
                }

                mysqli_stmt_bind_param($updateStmt, "s", $token);
                mysqli_stmt_execute($updateStmt);

                mysqli_stmt_close($updateStmt);
                header("Location: login.php?verify=succesverified");
                exit();
            }
            else{
                header("Location: login.php?verify=alreadyverified");
                exit();
            }
        }
    }

?>
