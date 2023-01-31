<?php
include "connect.php";
session_start();

if (isset($_POST['chat_refresh'])) {
    $userID = $_SESSION['userID'];
    $contacting = $_SESSION['last_contacted'];
    $sql = "SELECT * FROM chat_log WHERE (sender =$userID AND reciever = $contacting) OR (sender =$contacting AND reciever = $userID)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $output = "";
    while ($row = $result->fetch_assoc()) {
        if ($row['message'] !== null && $row['photo'] === null) {
            if ($row['sender'] == $userID) {
                // if sender is the userID, then display the message to the right of the screen
                $output .=  "<div class='right_container'>
                <div class='display_message_right me-2 mb-2'>" . $row['message'] .
                    "</div>
            </div>";
            } else {
                // if sender is the last_contacted, then display the message to the left of the screen
                $output .=  "<div class='left_container'>
            <div class='display_message_left ms-2 mb-2'>" . $row['message'] .
                    "</div>
        </div>";
            }
        }
    }

    echo $output;
    // $row = $result->fetch_all(MYSQLI_ASSOC);
    // echo json_encode($row);
}

// close connection
$conn->close();
