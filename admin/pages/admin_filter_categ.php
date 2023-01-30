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

    $sql = "SELECT * FROM pets_owned WHERE userID LIKE '%$search%' OR username LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%'  OR muni_name LIKE '%$search%'";
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

    $sql = "SELECT * FROM not_owned WHERE userID LIKE '%$search%' OR username LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%'  OR muni_name LIKE '%$search%'";
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

    $sql = "SELECT * FROM unver_ver WHERE (verified_id = 'no') AND (userID LIKE '%$search%' OR username LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%'  OR muni_name LIKE '%$search%') ";
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

    $sql = "SELECT * FROM unver_ver WHERE (verified_id = 'yes') AND (userID LIKE '%$search%' OR username LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%'  OR muni_name LIKE '%$search%') ";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

/**PETS */

//display the breeds based from the pet_type selected
if (isset($_POST['pet_type'])) {
    // get the pcid of the selected animal_type
    $pt = $_POST['pet_type'];
    $sql = "SELECT pcid FROM pet_category WHERE animal_type = '$pt'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $GLOBALS['pcid'] = $row['pcid'];
        }
    }

    // get all breeds
    $sql = "SELECT * FROM breed_category WHERE pcid= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $GLOBALS['pcid']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

//display pet_category_report (all of its content)
if (isset($_POST['pet_type_filter_all'])) {

    $sql = "SELECT * FROM pet_category_report ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

//display pet_category_report based from the pet_type selected
if (isset($_POST['pet_type_filter'])) {

    $sql = "SELECT * FROM pet_category_report WHERE animal_type = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['pet_type_filter']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

//display pet_category_report based from the breed selected
if (isset($_POST['breed'])) {
    $sql = "SELECT * FROM pet_category_report WHERE breed = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['breed']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


//display pet_category_report (all of its content) with municipality specified
if (isset($_POST['pt_fa']) && isset($_POST['muni3'])) {

    $sql = "SELECT * FROM pet_category_report WHERE muni_name = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['muni3']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


//display pet_category_report based from the pet_type selected with a specified municipality
if (isset($_POST['muni']) && isset($_POST['pt_fm'])) {
    $sql = "SELECT * FROM pet_category_report WHERE muni_name = ? AND animal_type = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_POST['muni'], $_POST['pt_fm']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

//display pet_category_report based from the breed selected with a municipality specified
if (isset($_POST['breed_muni']) && isset($_POST['muni2'])) {
    $sql = "SELECT * FROM pet_category_report WHERE breed = ? AND muni_name = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_POST['breed_muni'], $_POST['muni2']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


// pet_type through the live search with the specific municipality
if (isset($_POST['pet_type_LS'])) {
    $search = htmlspecialchars(trim($_POST['pet_type_LS']));

    $sql = "SELECT * FROM pet_category_report WHERE  petID LIKE '%$search%' OR name LIKE '%$search%' OR animal_type LIKE '%$search%' OR breed LIKE '%$search%' OR muni_name LIKE '%$search%' ";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}


// close connection
$conn->close();
