<?php
include 'connect.php';
session_start();

// for the list of users interacted with
if(isset($_POST['search'])){
   $search =  htmlspecialchars(trim($_POST['search']));
   $userID = $_SESSION['userID'];
    $sql = "SELECT userID, fname, lname, prof_pic FROM users WHERE userID = ANY(
        SELECT sender FROM chat_log WHERE sender = $userID OR reciever = $userID
        UNION
            SELECT reciever FROM chat_log WHERE sender = $userID OR reciever = $userID
        ) AND (fname LIKE '$search%' OR lname LIKE '$search%') AND userID <> $userID";
       $stmt = $conn->prepare($sql);
       $stmt->execute();
       $result = $stmt->get_result();
       $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
       echo  json_encode($user_cat_res);
}

// for the last message sent per user
if(isset($_POST['other_user'])){
     $sql = "SELECT * FROM chat_log WHERE (sender = ? AND reciever = ?) OR (sender = ? AND reciever = ?)  ORDER BY cLID DESC LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiii", $_POST['other_user'], $_SESSION['userID'], $_SESSION['userID'], $_POST['other_user']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
        echo  json_encode($user_cat_res);
 }

$conn->close();
