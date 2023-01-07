<?php
// connect to database
include 'connect.php';
// start a session
session_start();
// check if the user had already logged in
if (!isset($_SESSION['userID'])) {
    $conn->close();
    header("location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet | Fur-Kanlungan</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- link to pet_info.css -->
    <link rel="stylesheet" href="../css/pet_info.css">
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <?php include_once 'header.php'; ?>
    <div class='pet_info min-vh-100'>

        <?php
        $pet_id = "";
        $photo_array = array("");
        $pet_photo = "";
        // get the petID of the clicked pet from my_pets.php
        if (isset($_GET['pet_id'])) {
            $pet_id = $_GET['pet_id'];

            //     echo "
            //     <script>
            //     alert('$pet_id');
            // </script>
            //     ";


            // get the all photos of the pet
            $sql = "
                        SELECT  pet_photo.photo, pet.name, pet.age, pet.sex, pet.description,  breed_category.breed
                        FROM pet 
                        INNER JOIN pet_photo ON pet.petID = pet_photo.petID
                        INNER JOIN pet_category ON pet.pcID = pet_category.pcID
                        INNER JOIN breed_category ON pet.bcID = breed_category.bcID
                        WHERE pet.petID = '$pet_id';
                        ";
            $query = $conn->query($sql);
            if ($query->num_rows > 0) {
                
                while ($row = $query->fetch_assoc()) {
                    $pet_photo .= '../images/pet_pics/' . $row["photo"] . " ";
                    $pet_name = $row['name'];
                    $pet_age = $row['age'];
                    $pet_sex = $row['sex'];
                    $pet_description = $row['description'];
                    $pet_breed = $row['breed'];

                }
               
            }
        }
        $photo_array = array($pet_photo);
        $photo_array_str = implode($photo_array);
        $explode_pas = explode(" ", $photo_array_str);
        $arr_reverse = array_reverse($explode_pas);
        $str = $arr_reverse[1];
       
         echo "    <div class='pet_pics'>
                            <img src='$str'>
                        </div>
                        ";
        ?>

        <!-- div for pet details-->
        <div class="pet_details">
            <div class="details_container">

                <div class="name">Name: <span><?php echo $pet_name ?></span></div>
                <div class="name">Age: <span><?php echo $pet_age ?></span></div>
                <div class="name">Gender: <span><?php echo $pet_sex ?></span></div>
                <div class="name">Description:
                    <span><?php echo $pet_description ?></span>
                </div>
                <div class="name">Breed: <span><?php echo $pet_breed ?></span></div>

            </div>

        </div>


    </div>




    <?php include_once 'footer.php'; ?>
    <?php $conn->close(); ?>
</body>


</html>