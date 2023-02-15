<?php
// connect to database
include 'connect.php';
// start a session
session_start();

if (isset($_POST['uid']) && isset($_POST['pid'])) {

$sql = "";


    // $sql = "SELECT u.username, p.name FROM users AS u
    //         INNER JOIN pet AS p ON u.userID = p.userID
    //             WHERE u.userID = " . $_POST['uid'];
    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    // $result = $stmt->get_result();
    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         echo $row['username'];
    //     }
    // }



    echo $_SESSION['last_contacted'] . " " . $_SESSION['petID'];
}

$conn->close();
