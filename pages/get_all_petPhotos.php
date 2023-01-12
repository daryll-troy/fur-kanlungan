<?php

include 'connect.php';

// start a session
session_start();
$first_pic = $_SESSION['coverPetPic'];
$pet_id = $_SESSION['pet_id'];

// $sql = "SELECT pet_photo.photo FROM pet 
// INNER JOIN pet_photo ON pet.petID = pet_photo.petID
//  INNER JOIN pet_category ON pet.pcID = pet_category.pcID
// INNER JOIN breed_category ON pet.bcID = breed_category.bcID
// WHERE pet.petID = '$pet_id'";

$sql2 = "SELECT photo FROM pet_photo WHERE petID = '$pet_id'";

$pet_photo = "";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pet_photo .=  $row["photo"] . " ";
    }
}

//  convert the string $pet_photo to an array $explode_arr
$explode_arr = explode(" ", $pet_photo);
// remove that last blank aray item
array_splice($explode_arr, count($explode_arr) - 1, 1);
$json_pic_arr = json_encode($explode_arr);
$json_pic_arr = '{"photos" : ' . $json_pic_arr . '}';


if (isset($_POST['page'])) {
    echo $json_pic_arr;
}

if (isset($_POST['firstPic'])) {
    echo $first_pic;
}

$conn->close();
