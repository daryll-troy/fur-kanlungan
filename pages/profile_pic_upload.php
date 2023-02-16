<?php
include "connect.php";
session_start();

$filename = $_FILES['upload_pics']['name'];
$targetDir = "C:/xampp/htdocs/fur-kanlungan/images/prof_pics/";
$targetFilePath = $targetDir . $filename;
$uploadOk = 1;
$imageFileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$valid_extensions = array('jpg', 'jpeg', 'png');

if (!in_array(strtolower($imageFileType), $valid_extensions)) {
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    // echo 0;
} else {
    if (move_uploaded_file($_FILES['upload_pics']['tmp_name'], $targetFilePath)) {
        // echo $filename;
        // Then insert to database the filename of the photo
        $sql = "UPDATE users SET prof_pic = ? WHERE userID = " . $_SESSION['userID'];
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $filename);
        $stmt->execute();
    } else {
        echo "<script>alert('photo not uploaded to server')</script>";
    }
}


// close connection
$conn->close();
