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

<?php

if (isset($_POST['btn_create_pet'])) {
    //  Sign Up upload to database

    // get the post variables
    $name = htmlspecialchars(strtolower($_POST['name']));
    $birthyear = (int) htmlspecialchars(strtolower($_POST['birthyear']));
    $gender = htmlspecialchars(strtolower($_POST['gender']));

    $pet_category = htmlspecialchars(strtolower($_POST['pet_category']));
    $breed = htmlspecialchars(strtolower($_POST['breed']));

    $description = htmlspecialchars($_POST['description']);

    // get the breed id and pc id and pet id later
    $bcID = $pcID = $petID = "";
    // get userID
    $userID = $_SESSION['userID'];

    

    // File upload configuration 
    $targetDir = "C:/xampp/htdocs/fur-kanlungan/images/pet_pics/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $upload_pics = array_filter($_FILES['upload_pics']['name']);

    // check file size
    if ($_FILES['upload_pics']['size'] > 5000000) {

        try {
            // get breed id
            $get_bcID = "SELECT bcID FROM breed_category WHERE breed = '$breed'";
            $result = $conn->query($get_bcID);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $bcID = $row['bcID'];
                }
            }
            // get pet category id
            $get_pcID = "SELECT pcID FROM pet_category WHERE animal_type = '$pet_category'";
            $result = $conn->query($get_pcID);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $pcID = $row['pcID'];
                }
            }

            // upload the pet to pet table
            $stmt = $conn->prepare("INSERT INTO pet(name, age, sex, description, pcID, bcID, userID) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sissiii", $name, $birthyear, $gender, $description, $pcID, $bcID, $userID);
            $stmt->execute();
        } catch (Exception $stmt) {
            
        } finally {

            // get each file name in $_FILES
            foreach ($_FILES['upload_pics']['name'] as $key => $val) {
                // File upload path 
                $fileName = basename($_FILES['upload_pics']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;

                // Check whether file type is valid 
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server 
                    if (move_uploaded_file($_FILES["upload_pics"]["tmp_name"][$key], $targetFilePath)) {

                        $getPetID = "SELECT petID FROM pet WHERE name = '$name' AND age = $birthyear AND  sex = '$gender' AND description = '$description' AND pcID = $pcID AND bcID = $bcID AND userID = $userID";
                        $result = $conn->query($getPetID);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $petID = $row['petID'];
                            }
                        }

                        // upload pet photos to pet_photo
                        $stmt = $conn->prepare("INSERT INTO pet_photo(photo, petID) VALUES ( ?, ?)");
                        $stmt->bind_param("si", $fileName, $petID);
                        $stmt->execute();
                    } else {
                        $errorUpload .= $_FILES['upload_pics']['name'][$key] . ' | ';
                    }
                } else {
                    $errorUploadType .= $_FILES['upload_pics']['name'][$key] . ' | ';
                }
            }


            $conn->close();
            // echo "<script>alert('Pet Created!')</script>";
            echo "<script>
            window.location.href='my_pets.php';
            </script>";
            exit();
        }
    } else {
        echo '<script>alert("File size limit: 5MB")</script>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pet | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for create_pets.php.php -->
    <link rel="stylesheet" href="../css/create_pet.css">
  
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- header -->
    <?php include "header.php"; ?>

    <!-- create pet form -->
    <div class="create_pets min-vh-100">
        <div id="layer">


            <div class="form_div">


                <div class="create_pet_title">
                    <div><a href="my_pets.php"> <img src="../images/backTo.png" id="backTo"></a></div>
                    <div>
                        <h4 class="mb-4">Create Pet</h4>
                    </div>


                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="create_pet_form" method="post" enctype="multipart/form-data">
                    <!-- name -->
                    <div class="name_cont">
                        <label for="name" class="form-label  mt-2">Name</label>
                        <input type="text" class="form-control" id="name" placeholder=" Name" name="name">
                        <div> <small id="name_err" style="color: red;"></small></div>
                    </div>

                    <!-- birthyear -->
                    <div class="birthyear_cont">
                        <label for="birthyear" class="form-label  mt-2">Birthyear</label>
                        <input type="text" class="form-control" id="birthyear" placeholder="0000" name="birthyear">
                        <div class="mb-2"> <small id="birthyear_err" style="color: red;"></small></div>
                    </div>

                    <!-- gender -->
                    <div class="gender_cont">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select btn gender" aria-label="Default select example" id="gender" name="gender">
                            <option value="none" id="no_gender">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <div class="mb-2"> <small id="gender_err" style="color: red;"></small></div>
                    </div>

                    <!-- pet_category -->
                    <div class="pet_category_cont">
                        <label for="pet_category" class="form-label">Pet Category</label>
                        <select class="form-select btn pet_category" aria-label="Default select example" id="pet_category" name="pet_category">
                            <option value="none" class='get_animal_type'> Select Pet Category</option>
                            <?php
                            // select all pet category
                            $sql = "SELECT pcID, animal_type FROM pet_category ORDER BY animal_type";
                            $result = mysqli_query($conn, $sql);
                            // $pcID = "";
                            $get_animal_type = "";
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $get_animal_type = $row["animal_type"];
                                    echo "<option value='$get_animal_type' class='get_animal_type'>$get_animal_type</option>";
                                }
                            } else {
                                echo "
                                 <script> alert('Error: database connection failure');</script>
                            ";
                            }


                            ?>
                        </select>
                        <div class="mb-2"> <small id="pet_category_err" style="color: red;"></small></div>
                    </div>

                    <!-- breed -->
                    <div class="breed_cont">
                        <label for="breed" class="form-label">Breed</label>
                        <select class="form-select btn breed" aria-label="Default select example" id="breed" name="breed"></select>
                        <div class=""> <small id="breed_err" style="color: red;"></small></div>
                    </div>

                    <!-- Upload pics of the pet -->
                    <label for="upload_pics" class="form-label mt-2">Upload Photos</label>
                    <input class=" form-control" type="file" id="upload_pics" name="upload_pics[]" multiple accept=".jpg, .png, .jpeg">
                    <div class="mb-2"> <small id="upload_pics_err" style="color: red;"></small></div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="1" placeholder="Text here..."></textarea>
                        <div class="mb-2"> <small id="description_err" style="color: red;"></small></div>
                    </div>

                    <!-- Create button -->
                    <div class="create_button mb-2">
                        <input type="button" class="btn btn-primary btn_create_pet" name="btn_create_pet" id="btn_create_pet" value="Create">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- For choosing the appropriate breeds based on the pet category -->
    <script src="../js/create_pet.js"></script>
    <script src="../js/test.js"></script>
</body>

</html>