<?php

include "../../pages/connect.php";

// USERS

// pets owned with all municipalities
if (isset($_POST['pets_owned'])) {
    $sql = "SELECT * FROM  pets_owned ORDER BY userID";
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


// pets owned through the live search with the specific municipality
if (isset($_POST['pets_owned_LS'])) {
    $search = htmlspecialchars(trim($_POST['pets_owned_LS']));

    $sql = "SELECT * FROM pets_owned WHERE userID LIKE '%$search%' OR username LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%'";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}



// not owned with all municipalities
if (isset($_POST['not_owned'])) {
    $sql = "SELECT * FROM  not_owned ORDER BY userID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

// not owned with specific municipality
if (isset($_POST['not_owned_muni'])) {
    $sql = "SELECT * FROM  not_owned WHERE muni_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['not_owned_muni']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}


// not owned through the live search with the specific municipality
if (isset($_POST['not_owned_LS'])) {
    $search = htmlspecialchars(trim($_POST['not_owned_LS']));

    $sql = "SELECT * FROM not_owned WHERE userID LIKE '%$search%' OR username LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%'";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}


// unverified with all municipalities
if (isset($_POST['unverified'])) {
    $sql = "SELECT * FROM  unver_ver WHERE verified_id = 'no' ORDER BY userID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

// unverified with a specific municipality
if (isset($_POST['unverified_muni'])) {
    $sql = "SELECT * FROM  unver_ver WHERE verified_id = 'no' AND muni_name = ? ORDER BY userID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['unverified_muni']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}


// unverified through the live search with the specific municipality
if (isset($_POST['unverified_LS'])) {
    $search = htmlspecialchars(trim($_POST['unverified_LS']));

    $sql = "SELECT * FROM unver_ver WHERE (verified_id = 'no') AND (userID LIKE '%$search%' OR username LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%' ) ";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}


// verified with all municipalities
if (isset($_POST['verified'])) {
    $sql = "SELECT * FROM  unver_ver WHERE verified_id = 'yes' ORDER BY userID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}


// verified with a specific municipality
if (isset($_POST['verified_muni'])) {
    $sql = "SELECT * FROM  unver_ver WHERE verified_id = 'yes' AND muni_name = ? ORDER BY userID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['verified_muni']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

// verified through the live search with the specific municipality
if (isset($_POST['verified_LS'])) {
    $search = htmlspecialchars(trim($_POST['verified_LS']));

    $sql = "SELECT * FROM unver_ver WHERE (verified_id = 'yes') AND (userID LIKE '%$search%' OR username LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%' ) ";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

/**PETS */

//display the breeds based from the pet_type selected
if(isset($_POST['pet_type'])){
    $sql = "SELECT breed";
}

// close connection
$conn->close();
