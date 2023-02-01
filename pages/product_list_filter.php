<?php

include "connect.php";
session_start();

if (isset($_POST['pc'])) {

    $get_pcID = "";
    $getAllPets = "";

    // get the id of the pet category selected
    $sql = "SELECT pcID from pet_category WHERE animal_type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['pc']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $get_pcID = $row['pcID'];
        }
    }

    $sql = "SELECT p.prodID, p.prod_name, p.price, s.shop_name, pc.animal_type FROM product AS p 
    INNER JOIN shop AS s ON s.shopID = p.shopID
    INNER JOIN pet_category As pc ON pc.pcID = p.pcID
    WHERE p.pcID = ?
    ORDER BY prod_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $get_pcID);
    $stmt->execute();
    $result = $stmt->get_result();
    // fetch_assoc() won't work with the ajax process connected to this, thus, fetch_all()
    $pets = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($pets);
}


// get 1 photo of each pet
if (isset($_POST['petID'])) {

    $sql = "SELECT photo FROM product_photo WHERE prodID = ? ORDER BY prodphoID DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['petID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $one_photo = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($one_photo);
}


// IF SHOP IS SPECIFIC BUT PET CATEGORY IS ALL
if (isset($_POST['bc'])) {

    $get_bcID = "";
    $getAllPets = "";

    // get the id of the breed category selected
    $sql = "SELECT shopID from shop WHERE shop_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['bc']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $get_bcID = $row['shopID'];
        }
    }

    $sql = "SELECT p.prodID, p.prod_name, p.price, s.shop_name, pc.animal_type FROM product AS p 
    INNER JOIN shop AS s ON s.shopID = p.shopID
    INNER JOIN pet_category As pc ON pc.pcID = p.pcID
    WHERE p.shopID = ?
    ORDER BY prod_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $get_bcID);
    $stmt->execute();
    $result = $stmt->get_result();
    // fetch_assoc() won't work with the ajax process connected to this, thus, fetch_all()
    $breeds = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($breeds);
}


// IF SHOP IS SPECIFIC BUT PET CATEGORY IS ALL
if (isset($_POST['sp']) && isset($_POST['pcs'])) {

    $get_bcID = "";
    $getAllPets = "";

    // get the id of the breed category selected
    $sql = "SELECT shopID from shop WHERE shop_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['sp']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $get_bcID = $row['shopID'];
        }
    }

    $sql = "SELECT p.prodID, p.prod_name, p.price, s.shop_name, pc.animal_type FROM product AS p 
    INNER JOIN shop AS s ON s.shopID = p.shopID
    INNER JOIN pet_category As pc ON pc.pcID = p.pcID
    WHERE p.shopID = ? AND pc.animal_type = ?
    ORDER BY prod_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $get_bcID, $_POST['pcs']);
    $stmt->execute();
    $result = $stmt->get_result();
    // fetch_assoc() won't work with the ajax process connected to this, thus, fetch_all()
    $breeds = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($breeds);
}

// LIVE SEARCH
if (isset($_POST['search'])) {
    // protect search against cross site scripting
    $search = htmlspecialchars(trim($_POST['search']));

    // $sql = "SELECT * FROM pet WHERE name LIKE '$search%'";
    //     $sql = "SELECT p.*, bc.breed
    // FROM pet AS p
    // INNER JOIN breed_category AS bc ON bc.bcID = p.bcID 
    // WHERE p.name LIKE '$search%' OR p.sex LIKE '$search%' OR p.age LIKE '$search%' OR bc.breed LIKE '$search%'";

    $sql = "SELECT p.prodID, p.prod_name, p.price, s.shop_name, pc.animal_type FROM product AS p 
INNER JOIN shop AS s ON s.shopID = p.shopID
INNER JOIN pet_category As pc ON pc.pcID = p.pcID
WHERE p.prod_name LIKE '$search%' OR p.price LIKE '$search%' OR s.shop_name LIKE '$search%' OR pc.animal_type LIKE '$search%'
ORDER BY p.prod_name";
    $result = $conn->query($sql);

    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


// close connection
$conn->close();
