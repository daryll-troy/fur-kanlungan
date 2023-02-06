<?php

include "../../pages/connect.php";
session_start();


if (isset($_POST['userID'])) {
    $sql = "UPDATE users SET verified_id = 'yes' WHERE userID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST['userID']);
    $stmt->execute();
}


$conn->close();
