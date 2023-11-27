<?php
session_start();
    if (isset($_POST['acc'])){
        require 'connection.php';

        $titlu = $_POST['titlu'];
        $descriere = $_POST['descriere'];
        $link = $_POST['link'];

        $sql = "INSERT INTO exercitii (titlu, descriere, link) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: vizsu.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "sss", $titlu, $descriere, $link);
            if (mysqli_stmt_execute($stmt)) {
                $sql = "DELETE FROM sugestii WHERE titlu=? AND link=?";
                 $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: vizsu.php?error=sqlerror");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt, "ss", $titlu, $link);
                    mysqli_stmt_execute($stmt);
                }
                require "mailsend.php";
                header("Location: vizsu.php?success=true");
            }
            mysqli_stmt_execute($stmt);
            header("Location: vizsu.php");
            exit();
        }
    }
    else if (isset($_POST['ref'])){
        require 'connection.php';

        $titlu = $_POST['titlu'];
        $descriere = $_POST['descriere'];
        $link = $_POST['link'];

        $sql = "DELETE FROM sugestii WHERE titlu=? AND link=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: vizsu.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $titlu, $link);
            mysqli_stmt_execute($stmt);
            header("Location: vizsu.php");
            exit();
        }

    }
    else {
        header("Location: newexercitiu.php");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>