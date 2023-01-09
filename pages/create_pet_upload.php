<!-- NOTE REMINDER: DELETE THIS FILE OR REUSE IT FOR SOMETHING ELSE-->

<?php
// connect to database
include 'connect.php';
?>

<?php
//  Sign Up upload to database

$name = htmlspecialchars(strtolower($_POST['name']));
$birthyear = htmlspecialchars(strtolower($_POST['birthyear']));
$gender = htmlspecialchars(strtolower($_POST['gender']));

$pet_category= htmlspecialchars(strtolower($_POST['pet_category']));
$breed = htmlspecialchars(strtolower($_POST['breed']));

$description = htmlspecialchars($_POST['description']);
$upload_pics = $_FILES['upload_pics'];

$age = (int) date("Y") - (int) $birthyear;

$fileName = basename($_FILES["upload_pics"]["name"]);
echo $fileName;
// echo $name;
// echo "      ";
// echo $birthyear;
// echo "      ";
// echo $gender;
// echo "      ";
// echo $pet_category;
// echo "      ";
// echo $breed;
// echo "      ";
// echo $description;
// echo "      ";
// echo implode($upload_pics);
// echo "      ";



?>