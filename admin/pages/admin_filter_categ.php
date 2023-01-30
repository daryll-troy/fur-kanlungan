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


// pets owned through the live search 
if (isset($_POST['pets_owned_LS'])) {
    $search = htmlspecialchars(trim($_POST['pets_owned_LS']));

    $sql = "SELECT * FROM pets_owned WHERE userID LIKE '$search%' OR username LIKE '$search%' OR fname LIKE '$search%' OR lname LIKE '$search%'  OR muni_name LIKE '$search%'  ORDER BY userID";
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


// not owned through the live search
if (isset($_POST['not_owned_LS'])) {
    $search = htmlspecialchars(trim($_POST['not_owned_LS']));

    $sql = "SELECT * FROM not_owned WHERE userID LIKE '$search%' OR username LIKE '$search%' OR fname LIKE '$search%' OR lname LIKE '$search%'  OR muni_name LIKE '$search%'  ORDER BY userID";
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


// unverified through the live search 
if (isset($_POST['unverified_LS'])) {
    $search = htmlspecialchars(trim($_POST['unverified_LS']));

    $sql = "SELECT * FROM unver_ver WHERE (verified_id = 'no') AND (userID LIKE '$search%' OR username LIKE '$search%' OR fname LIKE '$search%' OR lname LIKE '$search%'  OR muni_name LIKE '$search%')  ORDER BY userID";
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

// verified through the live search 
if (isset($_POST['verified_LS'])) {
    $search = htmlspecialchars(trim($_POST['verified_LS']));

    $sql = "SELECT * FROM unver_ver WHERE (verified_id = 'yes') AND (userID LIKE '$search%' OR username LIKE '$search%' OR fname LIKE '$search%' OR lname LIKE '$search%'  OR muni_name LIKE '$search%') ORDER BY userID ";
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


// pet_type through the live search 
if (isset($_POST['pet_type_LS'])) {
    $search = htmlspecialchars(trim($_POST['pet_type_LS']));
    $sql = "SELECT * FROM pet_category_report WHERE  petID LIKE '$search%' OR name LIKE '$search%' OR animal_type LIKE '$search%' OR breed LIKE '$search%' OR muni_name LIKE '$search%' ORDER BY petID";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

//birthyear: all years
if (isset($_POST['by_all_years'])) {
    $sql = "SELECT * FROM birthyear_report  ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

//birthyear: all years with a specified municipality
if (isset($_POST['bay_muni']) && isset($_POST['muni_ay'])) {
    $sql = "SELECT * FROM birthyear_report WHERE muni_name = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['muni_ay']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

//birthyear: specific years
if (isset($_POST['by_a_year'])) {
    $sql = "SELECT * FROM birthyear_report WHERE age = ?  ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['by_a_year']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


//birthyear: specific year with a specified municipality
if (isset($_POST['bay_muni2']) && isset($_POST['muni_ay2'])) {
    $sql = "SELECT * FROM birthyear_report WHERE age = ? AND muni_name = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_POST['bay_muni2'], $_POST['muni_ay2']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


// birthyear through the live search 
if (isset($_POST['birthyear_LS'])) {
    $search = htmlspecialchars(trim($_POST['birthyear_LS']));
    $sql = "SELECT * FROM birthyear_report WHERE  petID LIKE '$search%' OR name LIKE '$search%' OR age LIKE '$search%' OR muni_name LIKE '$search%' ORDER BY petID";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

//sex: both
if (isset($_POST['both_sex'])) {
    $sql = "SELECT * FROM sex_report  ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

//sex: both with a specified municipality
if (isset($_POST['both_sex_muni']) && isset($_POST['muni_sex'])) {
    $sql = "SELECT * FROM sex_report WHERE muni_name = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['muni_sex']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


//sex: sepecific sex
if (isset($_POST['per_sex'])) {
    $sql = "SELECT * FROM sex_report WHERE sex = ?  ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['per_sex']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


//sex: specific sex with a specified municipality
if (isset($_POST['per_sex_muni']) && isset($_POST['muni_sex2'])) {
    $sql = "SELECT * FROM sex_report WHERE sex = ? AND muni_name = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_POST['per_sex_muni'], $_POST['muni_sex2']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


// sex through the live search 
if (isset($_POST['sex_LS'])) {
    $search = htmlspecialchars(trim($_POST['sex_LS']));
    $sql = "SELECT * FROM sex_report WHERE  petID LIKE '$search%' OR name LIKE '$search%' OR sex LIKE '$search%' OR muni_name LIKE '$search%' ORDER BY petID";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}


// vaccinated: both
if (isset($_POST['both_vaccinated'])) {
    $sql = "SELECT * FROM vaccinated_report  ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

//vaccinated: both with a specified municipality
if (isset($_POST['both_vaccinated_muni']) && isset($_POST['muni_vaccinated'])) {
    $sql = "SELECT * FROM vaccinated_report WHERE muni_name = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['muni_vaccinated']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


//vaccinated: sepecific vaccinated
if (isset($_POST['per_vaccinated'])) {
    $sql = "SELECT * FROM vaccinated_report WHERE vaccinated = ?  ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['per_vaccinated']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


//vaccinated: specific vaccinated with a specified municipality
if (isset($_POST['per_vaccinated_muni']) && isset($_POST['muni_vaccinated2'])) {
    $sql = "SELECT * FROM vaccinated_report WHERE vaccinated = ? AND muni_name = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_POST['per_vaccinated_muni'], $_POST['muni_vaccinated2']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

// vaccinated through the live search 
if (isset($_POST['vaccinated_LS'])) {
    $search = htmlspecialchars(trim($_POST['vaccinated_LS']));
    $sql = "SELECT * FROM vaccinated_report WHERE  petID LIKE '$search%' OR name LIKE '$search%' OR vaccinated LIKE '$search%' OR muni_name LIKE '$search%' ORDER BY petID";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}


// owner: all muni
if (isset($_POST['owner'])) {
    $sql = "SELECT * FROM owner_report  ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

//owner:  specified municipality
if (isset($_POST['muni_owner'])) {
    $sql = "SELECT * FROM owner_report WHERE muni_name = ? ORDER BY petID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['muni_owner']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}

// owner through the live search 
if (isset($_POST['owner_LS'])) {
    $search = htmlspecialchars(trim($_POST['owner_LS']));
    $sql = "SELECT * FROM owner_report WHERE  petID LIKE '$search%' OR name LIKE '$search%' OR username LIKE '$search%' OR fname LIKE '$search%' OR lname LIKE '$search%' OR muni_name LIKE '$search%' ORDER BY petID";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

/** SHOP_PROD */
//all_muni & all_pet_type
if(isset($_POST['am_ap'])){
    $sql = "SELECT * FROM shop_prod_report  ORDER BY prodID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


//all_muni & specific_pet_type
if(isset($_POST['am_sp'])){
    $sql = "SELECT * FROM shop_prod_report WHERE animal_type = ? ORDER BY prod_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['am_sp']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


//specific_muni & all_pet_type
if(isset($_POST['sp_muni'])){
    $sql = "SELECT * FROM shop_prod_report WHERE muni_name = ? ORDER BY prod_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['sp_muni']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


//specific_muni & specific_pet_type
if(isset($_POST['sm_sp']) && isset($_POST['sp_muni2'])){
    $sql = "SELECT * FROM shop_prod_report WHERE animal_type = ? AND muni_name = ? ORDER BY prod_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_POST['sm_sp'], $_POST['sp_muni2']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


// all_pet_type & specific_shop_name
if( isset($_POST['ss1'])){
    $sql = "SELECT * FROM shop_prod_report WHERE shop_name = ? ORDER BY prod_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['ss1']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


// specific_pet_type & specific_shop_name
if(isset($_POST['sp_ss']) && isset($_POST['ss2'])){
    $sql = "SELECT * FROM shop_prod_report WHERE animal_type = ? AND shop_name = ? ORDER BY prod_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_POST['sp_ss'], $_POST['ss2']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


// shop_prod through the live search 
if (isset($_POST['shop_prod_LS'])) {
    $search = htmlspecialchars(trim($_POST['shop_prod_LS']));
    $sql = "SELECT * FROM shop_prod_report WHERE  prodID LIKE '$search%' OR prod_name LIKE '$search%' OR price LIKE '$search%' OR shopID LIKE '$search%' OR shop_name LIKE '$search%' OR muni_name LIKE '$search%' OR animal_type LIKE '$search%' ORDER BY prodID";
    $result = $conn->query($sql);
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}


// close connection
$conn->close();
