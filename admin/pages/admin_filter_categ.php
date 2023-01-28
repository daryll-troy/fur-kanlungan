<?php

include "../../pages/connect.php";

// USERS

if (isset($_POST['pets_owned'])) {
    $sql = "SELECT * FROM  pets_owned";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}
// pets owned with specific municipality
if (isset($_POST['pets_owned_muni'])) {
    $sql = "SELECT * FROM  pets_owned WHERE muni_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['pets_owned_muni']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

if (isset($_POST['unverified'])) {
    $sql = "SELECT * FROM  users WHERE verified_id = 'no'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}
// close connection
$conn->close();
