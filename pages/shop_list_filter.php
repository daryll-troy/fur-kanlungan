<?php

include "connect.php";
session_start();

if (isset($_POST['pc'])) {

    // $get_pcID = "";

  $sql = "SELECT s.*, m.muni_name FROM municipality AS m 
    INNER JOIN shop AS s ON s.muniID = m.muniID WHERE m.muni_name = ? ORDER BY s.shop_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['pc']);
    $stmt->execute();
    $result = $stmt->get_result();
    // fetch_assoc() won't work with the ajax process connected to this, thus, fetch_all()
    $pets = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($pets);
}


// get 1 photo of each pet
if (isset($_POST['petID'])) {

    $sql = "SELECT photo FROM shop_photo WHERE shopID = ? ORDER BY shopphoID DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['petID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $one_photo = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($one_photo);
}


// LIVE SEARCH
if (isset($_POST['search'])) {
    // protect search against cross site scripting
    $search = htmlspecialchars(trim($_POST['search']));

    $sql = "SELECT s.*, m.muni_name FROM municipality AS m 
    INNER JOIN shop AS s ON s.muniID = m.muniID WHERE s.shop_name LIKE '$search%' OR m.muni_name LIKE '$search%' OR s.email LIKE '%$search%' OR s.open_hours LIKE '%$search%' ORDER BY s.shop_name";
    $result = $conn->query($sql);

    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
}


// close connection
$conn->close();
