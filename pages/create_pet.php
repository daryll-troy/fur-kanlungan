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
    <title>Create Pet | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for create_pets.php.php -->
    <link rel="stylesheet" href="../css/create_pet.css">
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- Javascript -->
    <script src="../js/create_pet.js"></script>
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $("#pet_category").change(function() {
        //         var pc = $("#pet_category").val();
        //         alert(pc);
        //         $.ajax({
        //             url: 'choose_breed.php',
        //             method: 'post',
        //             data: 'pc=' + pc
        //         }).done(function(breeds) {
                    
        //             breeds = JSON.parse(breeds);
        //             console.log(breeds);
        //             $('#breed').empty();
        //             breeds.forEach(function(breed) {
        //                 $('#breed').append('<option>' + breed.breed + '</option>')
        //             })
        //         })
        //     })
        // })
    </script>
</head>

<body>
    <!-- header -->
    <?php include "header.php"; ?>
    <!-- create pet form -->
    <div class="create_pets min-vh-100">
        <div class="form_div">
            <div class="create_pet_title">
                <h4 class="mb-4">Create Pet</h4>
            </div>
            <form action="" id="create_pet_form">
                <!-- name -->
                <div class="name_cont">
                    <label for="name" class="form-label  mt-2">Name</label>
                    <input type="text" class="form-control" id="name" placeholder=" Name" name="name">
                    <div> <small id="name_err" style="color: red;">Invalid name</small></div>
                </div>

                <!-- age -->
                <div class="age_cont">
                    <label for="age" class="form-label  mt-2">Age</label>
                    <input type="text" class="form-control" id="age" placeholder="Age" name="age">
                    <div class="mb-2"> <small id="age_err" style="color: red;">Invalid age</small></div>
                </div>

                <!-- gender -->
                <div class="gender_cont">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select btn gender" aria-label="Default select example" id="gender" name="gender">
                        <option value="no_gender">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <div class="mb-2"> <small id="gender_err" style="color: red;">No gender selected</small></div>
                </div>

                <!-- pet_category -->
                <div class="pet_category_cont">
                    <label for="pet_category" class="form-label">Pet Category</label>
                    <select class="form-select btn pet_category" aria-label="Default select example" id="pet_category" name="pet_category">
                        <option value="none" class='get_animal_type'> Select Pet Category</option>
                        <?php
                        // select all pet category
                        $sql = "SELECT pcID, animal_type FROM pet_category";
                        $result = mysqli_query($conn, $sql);
                        // $pcID = "";
                        $get_animal_type = "";
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                // $pcID = $row['pcID'];
                                $get_animal_type = $row["animal_type"];
                                echo "<option value='$get_animal_type' class='get_animal_type'>$get_animal_type</option>";
                            }
                        } else {
                        }


                        ?>
                    </select>
                    <div class="mb-2"> <small id="pet_category_err" style="color: red;">No pet category selected</small></div>
                </div>

                <!-- breed -->
                <div class="breed_cont">
                    <label for="breed" class="form-label">Breed</label>
                    <select class="form-select btn breed" aria-label="Default select example" id="breed" name="breed">
                       

                    </select>
                    <div class="mb-2"> <small id="breed_err" style="color: red;">No breed selected</small></div>
                </div>

                <!-- Create button -->
                <div class="create_button mb-2">
                    <input type="button" class="btn btn-primary btn_create_pet" id="btn_create_pet" value="Create">
                </div>
            </form>

        </div>
    </div>


    <!-- close connection -->
    <?php mysqli_close($conn); ?>
</body>

</html>