<?php

include '../../pages/connect.php';

// USERS

if (isset($_POST['user_all_muni'])) {
    $sql = "SELECT * FROM  users AS u 
    INNER JOIN municipality AS m 
    ON m.muniID =  u.muniID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

if (isset($_POST['user_muni'])) {
    $sql = "SELECT * FROM  users AS u 
    INNER JOIN municipality AS m 
    ON m.muniID =  u.muniID 
    WHERE m.muni_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['muni']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

if (isset($_POST['user_LS'])) {
    $user_LS = $_POST['user_LS'];

    $sql = "SELECT * FROM  users AS u 
    INNER JOIN municipality AS m 
    ON m.muniID =  u.muniID 
    WHERE m.muni_name LIKE '$user_LS%' OR u.username LIKE '$user_LS%' OR u.email LIKE '$user_LS%' OR u.fname LIKE '$user_LS%' OR u.lname LIKE '$user_LS%' OR u.userID LIKE '$user_LS%' OR u.date_time LIKE '$user_LS%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}




$conn->close();
