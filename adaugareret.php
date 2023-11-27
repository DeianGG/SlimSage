<?php
session_start();
require "connection.php";

if (isset($_POST['adaugareex'])) {
    $titlu = $_POST['titlu'];
    $descriere = $_POST['descriere'];

    if (isset($_FILES['photo'])) {
        $file_name = $_FILES['photo']['name'];
        $file_temp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $upload_dir = "uploads/";

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($file_temp, $upload_dir . $file_name)) {
            $sql = "INSERT INTO retete (Titlu, Descriere, Poza) 
                    VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                $file_path = $upload_dir . $file_name;

                mysqli_stmt_bind_param($stmt, "sss", $titlu, $descriere, $file_path);
                mysqli_stmt_execute($stmt);

                mysqli_stmt_close($stmt);
                mysqli_close($conn);

                header("Location: index.php");
                exit();
            } else {
                // Handle statement preparation error
                echo "Statement preparation error: " . mysqli_error($conn);
            }
        } else {
            // Handle file upload error
            echo "File upload failed.";
        }
    } else {
        // Handle missing file error
        echo "No file uploaded.";
    }
} else {
    // Redirect if the form wasn't submitted
    header("Location: newreteta.php");
    exit();
}
?>