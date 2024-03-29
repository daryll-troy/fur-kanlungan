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

<!--  delete pet -->
<?php

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posted Pets | Fur-Kanlungan </title>
    <link rel="icon" href="../images/logo.gif" type="image/gif">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for my_pets.php.php -->
    <link rel="stylesheet" href="../css/my_pets.css">
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- update icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</head>

<body>
    <?php include_once 'header.php'; ?>
    <div class="my_pets min-vh-100">
        <div class="list_my_pets">
            <!-- button for creating pets -->
            <div class="create_pets">
                <a href="create_pet.php"><img src="../images/add_button.png" alt=""></a>
            </div>

            <?php
            // get the userID of the user account
            $user = $_SESSION['userID'];
            $pet_photo = "";
            $pet_name = "";

            $sql = "
                    SELECT pet.petID, pet.name, pet.status, us2.fname, us2.lname
                    FROM pet 
                    INNER JOIN users AS us1 ON pet.userID = us1.userID
                    INNER JOIN users AS us2 ON pet.given_to = us2.userID
                    WHERE us1.userID = '$user' ORDER BY pet.name
                    ";
            $query = $conn->query($sql);
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {

                    $pet_name = $row['name'];
                    $pet_id = $row['petID'];
                    $pet_status = $row['status'];
                    $us2_fname =  $row['fname'];
                    $us2_lname =  $row['lname'];

                    // display the current pets of the user 
                    echo "<div class='each_pet'>";

                    // display only the latest image of the pet 
                    $sql_1_photo =      "
                                        SELECT pet_photo.photo
                                        FROM pet_photo 
                                        INNER JOIN pet ON pet.petID = pet_photo.petID
                                        WHERE pet_photo.petID = '$pet_id' ORDER BY pet_photo.petphoID DESC LIMIT 1;
                                    ";
                    $query_1_photo = $conn->query($sql_1_photo);
                    if ($query_1_photo->num_rows > 0) {
                        while ($row_1_photo = $query_1_photo->fetch_assoc()) {
                            // to be passed as a $_GET value
                            $photo_fileName = $row_1_photo['photo'];

                            $pet_photo = '../images/pet_pics/' . $row_1_photo['photo'];
                            echo "
                                    <div class='pet_photo'>
                                        <a href='pet_info.php?pet_id=$pet_id'>
                                            <img src='$pet_photo' />
                                        </a>
                                    </div>
                                ";
                        }
                    }

                    // display the name of the pet 

                    echo "  
                                <div class='pet_name'>
                                    <a href='pet_info.php?pet_id=$pet_id'>
                                        <div> $pet_name</div>
                                    </a>
                                    <div class='status'> $pet_status : $us2_fname $us2_lname </div>
                                </div>
                           
                                ";


                

                    // update pets
                    echo "  <div class='pang-row'>
                                    <div class='update_pets'>
                                        
                                            <a href='update_pet.php?pet_id=$pet_id'>
                                                <span class='material-symbols-outlined'>
                                                update
                                            </span>
                                        </a>
                                    
                                    </div>
                    ";
                    // delete pets
                    echo "
                                    <div class='delete_pets' id='delete_pets'>
                                            <a href='delete_pet.php?pet_id=$pet_id'>
                                                    <span class='material-symbols-outlined delete_pet_img' id='delete_pet_img'>
                                                    delete
                                                </span>
                                          </a>
                                        
                                    </div>
                             </div>
                            ";
                    echo "</div>";
                }
            } else {
                echo "<div class='zero_pets'>";
                echo "
                         <div >No pets uploaded yet.</div> 
                    ";
                echo "</div>";
            }
            ?>

        </div>
    </div>

    <?php include_once 'footer.php'; ?>
    <!-- add color to link item of this page on the header -->
    <script>
        function navbarColor() {
            document.getElementById('my_pets').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
        }
        navbarColor();
    </script>

    <!-- can't get the class index of the clicked div -->
    <!-- <script src="../js/delete_pet.js"></script> -->

</body>

</html>

<?php $conn->close(); ?>