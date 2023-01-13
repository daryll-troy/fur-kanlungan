<?php

include "connect.php";
session_start();

if (isset($_POST['pc'])) {
    //NOTE REMINDER: DO NOT USE SESSION HERE. IT WILL CAUSE AN ERROR
    
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

    $sql = "SELECT * FROM pet WHERE pcID = ? ";
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

    $sql = "SELECT photo FROM pet_photo WHERE petID = ? ORDER BY petphoID DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['petID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $one_photo = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($one_photo);
}

// close connection
$conn->close();
