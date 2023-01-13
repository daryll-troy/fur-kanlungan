<?php

include "connect.php";
session_start();



// get all pets based from a pet_category
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

    $sql = "SELECT * FROM pet WHERE pcID = ? ORDER BY name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $get_pcID);
    $stmt->execute();
    $result = $stmt->get_result();
    // fetch_assoc() won't work with the ajax process connected to this, thus, fetch_all()
    $pets = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($pets);
}

// get breed name
if (isset($_POST['breedName'])) {
    $sql = "SELECT breed FROM breed_category WHERE bcID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['breedName']);
    $stmt->execute();
    $result = $stmt->get_result();
    $one_photo = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($one_photo);
}

// get 1 photo of each pet
if (isset($_POST['petID'])) {

    $sql = "SELECT photo FROM pet_photo WHERE petID = ? ORDER BY petphoID DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['petID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $one_photo = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($one_photo);
}


// get all pets based from a breed_category
if (isset($_POST['bc'])) {

    $get_bcID = "";
    $getAllPets = "";

    // get the id of the pet category selected
    $sql = "SELECT bcID from breed_category WHERE breed = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['bc']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $get_bcID = $row['bcID'];
        }
    }

    $sql = "SELECT * FROM pet WHERE bcID = ?  ORDER BY name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $get_bcID);
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

    $sql = "SELECT * FROM pet WHERE name LIKE '" . $search . "%'";

    $result = $conn->query($sql);

    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}
// close connection
$conn->close();
