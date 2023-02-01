<?php

include 'connect.php';

// start a session
session_start();

$first_pic = $_SESSION['coverPetPic'];
$pet_id = $_SESSION['product_id'];

$sql2 = "SELECT photo FROM product_photo WHERE prodID = '$pet_id'";

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
