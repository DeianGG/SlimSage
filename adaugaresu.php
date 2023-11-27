<?php
    session_start();
    if (isset($_POST['adaugaresu'])){
        require 'connection.php';

        $titlu = $_POST['titlu'];
        $descriere = $_POST['descriere'];
        $link = $_POST['link'];

        $sql = "INSERT INTO sugestii (titlu, descriere, link) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: newexercitiu.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "sss", $titlu, $descriere, $link);
            mysqli_stmt_execute($stmt);
            header("Location: index.php");
            exit();
        }
    }
    else {
        header("Location: newexsu.php");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>