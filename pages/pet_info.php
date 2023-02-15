<?php
// connect to database
include 'connect.php';
// start a session
session_start();
// // check if the user had already logged in
if (!isset($_SESSION['userID'])) {
    $conn->close();
    header("location: ../index.php");
    exit();
}
?>

<?php
$pet_id = "";
$photo_array = array();
$pet_photo = "";
$pet_user = "";
// get the petID of the clicked pet from my_pets.php
if (isset($_GET['pet_id'])) {
    $pet_id = $_GET['pet_id'];
    $_SESSION['pet_id'] = $_GET['pet_id'];

    // get the all photos of the pet
    $sql = "
                        SELECT  u.fname, u.lname, pet.userID, pet_photo.photo, pet.name, pet.age, pet.sex, pet.description, pet.vaccinated, breed_category.breed
                        FROM pet 
                        INNER JOIN pet_photo ON pet.petID = pet_photo.petID
                        INNER JOIN pet_category ON pet.pcID = pet_category.pcID
                        INNER JOIN breed_category ON pet.bcID = breed_category.bcID
                        INNER JOIN users AS u ON u.userID = pet.userID
                        WHERE pet.petID = '$pet_id';
                        ";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {
            $pet_photo =  $row["photo"];
            $pet_name = $row['name'];
            $pet_age = $row['age'];
            $pet_sex = $row['sex'];
            $pet_description = $row['description'];
            $pet_breed = $row['breed'];
            $pet_user = $row['userID'];
            $GLOBALS['fname'] = $row['fname'];
            $GLOBALS['lname'] = $row['lname'];
            $GLOBALS['vaccinated'] = $row['vaccinated'];
        }
    } else {
        echo "<script>alert('No such Pet ID!!')</script>";
        echo "<script>window.location.href = 'pet_list.php'</script>";
        exit();
    }
}

// this will be used for the first pic displayed upon loading of pet_info
$_SESSION['coverPetPic'] = $pet_photo;



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet | Fur-Kanlungan</title>
    <link rel="icon" href="../images/logo.gif" type="image/gif">
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
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <div class='pet_info min-vh-100'>
        <!-- div for pet details -->
        <div class='pet_pics'>
            <div class='previous_pic'>
                <img src='../images/backward.png' onclick="backward()">
            </div>
            <img src='' id="pet_pic">

            <div class='next_pic'>
                <img src='../images/forward.png' onclick="forward()">
            </div>
        </div>

        <!-- div for pet details-->
        <div class="pet_details">
            <div class="details_container">
                <div class="back_img">
                    <img src="../images/backTo.png" alt="" id="backTo" onclick="history.back()">
                    <div class="name prodName">Pet <span><?php echo $pet_name ?></span></div>
                </div>
                <div id="not_desc">
                  
                    <div class="name">Age: <span><?php echo date("Y") - $pet_age ?></span></div>
                    <div class="name">Gender: <span><?php echo $pet_sex ?></span></div>
                    <div class="name">Owner: <span><?php echo   $GLOBALS['fname'] . " " . $GLOBALS['lname'] ?></span></div>
                    <div class="name">Breed: <span><?php echo $pet_breed ?></span></div>
                    <div class="name">Vaccinated: <span><?php echo  $GLOBALS['vaccinated'] ?></span></div>
                </div>
                <div id="desc">
                    <div class="name">Description: <br>
                        <div><?php echo $pet_description ?></div>
                    </div>
                </div>
                <?php
                if ($_SESSION['userID'] === $pet_user) {
                ?>
                    <div class="go_back">
                        <div style="color: red;">This is your pet.</div>
                        <a href="my_pets.php"><input type="button" value="Posted" class="btn btn-primary back_button"></a>

                    </div>
                <?php
                } else {
                ?>
                    <div class="go_back">
                        <a href="chat_box.php?pet_user=<?php echo $pet_user ?>"><input type="button" value="Message Owner" class="btn btn-primary back_button"></a>

                    </div>
                <?php
                }
                ?>
            </div>

        </div>


    </div>




    <?php include_once 'footer.php'; ?>
    <script src="../js/pet_info_pic.js"></script>

    <?php $conn->close(); ?>

</body>


</html>