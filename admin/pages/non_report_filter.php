<?php

include '../../pages/connect.php';

// USERS

if (isset($_POST['user_all_muni'])) {
    $sql = "SELECT * FROM  users AS u 
    INNER JOIN municipality AS m 
    ON m.muniID =  u.muniID
    ORDER BY u.userID";
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
    WHERE m.muni_name = ?
    ORDER BY u.userID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['user_muni']);
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
    WHERE m.muni_name LIKE '$user_LS%' OR u.username LIKE '$user_LS%' OR u.email LIKE '$user_LS%' OR u.fname LIKE '$user_LS%' OR u.lname LIKE '$user_LS%' OR u.userID LIKE '$user_LS%' OR u.date_time LIKE '$user_LS%' ORDER BY u.userID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

//PETS

if (isset($_POST['pet_all'])) {
    $sql = "SELECT p.*, pc.animal_type, bc.breed, u.fname, u.lname FROM  pet AS p 
    INNER JOIN pet_category AS pc
    ON p.pcID =  pc.pcID
    INNER JOIN breed_category AS bc
    ON p.bcID =  bc.bcID
    INNER JOIN users AS u
    ON u.userID =  p.userID
    ORDER BY p.petID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

if (isset($_POST['pet_LS'])) {
    $pet_LS = $_POST['pet_LS'];

    $sql = "SELECT p.*, pc.animal_type, bc.breed, u.fname, u.lname FROM  pet AS p 
    INNER JOIN pet_category AS pc
    ON p.pcID =  pc.pcID
    INNER JOIN breed_category AS bc
    ON p.bcID =  bc.bcID
    INNER JOIN users AS u
    ON u.userID =  p.userID
    WHERE p.petID LIKE '$pet_LS%' OR p.name LIKE '$pet_LS%' OR p.age LIKE '$pet_LS%'  OR p.date_time LIKE '$pet_LS%'
    ORDER BY p.petID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

//PRODUCT


if (isset($_POST['product_all'])) {
    $sql = "SELECT p.* , pc.animal_type, s.shop_name
    FROM product as p
    INNER JOIN pet_category AS pc ON pc.pcID = p.pcID
    INNER JOIN shop AS s ON s.shopID = p.shopID
    ORDER BY p.prodID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

if (isset($_POST['product_LS'])) {
    $product_LS = $_POST['product_LS'];

    $sql = "SELECT p.* , pc.animal_type, s.shop_name
    FROM product as p
    INNER JOIN pet_category AS pc ON pc.pcID = p.pcID
    INNER JOIN shop AS s ON s.shopID = p.shopID
    WHERE p.prodID LIKE '$product_LS%' OR p.prod_name LIKE '$product_LS%' OR p.price LIKE '$product_LS%' OR p.date_time LIKE '$product_LS%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}


// SHOP 

if (isset($_POST['shop_all_muni'])) {
    $sql = "SELECT * FROM  shop AS s
    INNER JOIN municipality AS m 
    ON m.muniID =  s.muniID
    ORDER BY s.shopID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

if (isset($_POST['shop_muni'])) {
    $sql = "SELECT * FROM  shop AS s
    INNER JOIN municipality AS m 
    ON m.muniID =  s.muniID
    WHERE m.muni_name = ?
    ORDER BY s.shopID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['shop_muni']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

if (isset($_POST['shop_LS'])) {
    $shop_LS = $_POST['shop_LS'];

    $sql = "SELECT * FROM  shop AS s
    INNER JOIN municipality AS m 
    ON m.muniID =  s.muniID 
    WHERE m.muni_name LIKE '$shop_LS%' OR s.shopID LIKE '$shop_LS%' OR s.email LIKE '$shop_LS%' OR s.shop_name LIKE '$shop_LS%' OR s.owner LIKE '$shop_LS%' OR s.contact_no LIKE '$shop_LS%' OR s.open_hours LIKE '$shop_LS%' OR s.date_time LIKE '$shop_LS%' ORDER BY s.shopID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}



// CLINIC

if (isset($_POST['clinic_all_muni'])) {
    $sql = "SELECT * FROM  clinic AS s
    INNER JOIN municipality AS m 
    ON m.muniID =  s.muniID
    ORDER BY s.clinicID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

if (isset($_POST['clinic_muni'])) {
    $sql = "SELECT * FROM  clinic AS s
    INNER JOIN municipality AS m 
    ON m.muniID =  s.muniID
    WHERE m.muni_name = ?
    ORDER BY s.clinicID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['clinic_muni']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

if (isset($_POST['clinic_LS'])) {
    $clinic_LS = $_POST['clinic_LS'];

    $sql = "SELECT * FROM  clinic AS s
    INNER JOIN municipality AS m 
    ON m.muniID =  s.muniID 
    WHERE m.muni_name LIKE '$clinic_LS%' OR s.clinicID LIKE '$clinic_LS%' OR s.email LIKE '$clinic_LS%' OR s.clinic_name LIKE '$clinic_LS%' OR s.owner LIKE '$clinic_LS%' OR s.contact_no LIKE '$clinic_LS%' OR s.open_hours LIKE '$clinic_LS%' OR s.date_time LIKE '$clinic_LS%' ORDER BY s.clinicID";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}


$conn->close();
