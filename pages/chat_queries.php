<?php
include "connect.php";
session_start();

// if send button is clicked when sending the message
if(isset($_POST['message'])){
    $sql = "INSERT INTO chat_log(sender, reciever, message) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $_SESSION['userID'], $_SESSION['last_contacted'] ,$_POST['message'] );
    $stmt->execute();
}
// if enter key is pressed when sending the message
if(isset($_POST['enter_key'])){
    $sql = "INSERT INTO chat_log(sender, reciever, message) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $_SESSION['userID'], $_SESSION['last_contacted'] ,$_POST['enter_key'] );
    $stmt->execute();
    echo "success";
}



// close connection
$conn->close();
