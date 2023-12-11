<?php
if (isset($_POST['login-submit'])){
    require 'connection.php';

    $username=$_POST['userlogin'];
    $password=$_POST['passlogin'];
    $sql="SELECT * FROM users WHERE email=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: login.php?error=sqlerror");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if($row=mysqli_fetch_assoc($result))
        {
            $pwdcheck=password_verify($password,$row['password']);
            if($pwdcheck==false){
                header("Location: login.php?error=wrongpassword");
                exit();
            }
            else{
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$row['email'];
                $_SESSION['permission']=$row['permission'];
                if($row['verified']==1){
                    $_SESSION['verified']=true;
                }
                else{
                    $_SESSION['verified']=false;
                }
                header("Location: index.php?login=success");
                exit();
            }
        }
        else{
            header("Location: login.php?error=nouser");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: login.php");
    exit();
}
?>
