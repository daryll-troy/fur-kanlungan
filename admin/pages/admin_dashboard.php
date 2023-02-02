<?php
include "../../pages/connect.php";
session_start();

if (!isset($_SESSION['adminID'])) {
    header("location: admin-login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad-Dashboard |Fur-Kanlungan</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../../css/css-resets.css">
    <!-- css for admin_dashboard.php.php -->
    <link rel="stylesheet" href="../css/admin_dashboard.css">

    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/admin_header.css">
    <!-- update icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "admin_header.php" ?>
    <div class="entity min-vh-100">
        <!-- List and Filter the Entities -->
        <div class="list_entity">
            <div class="categories">
                <select class="form-select btn entity_category" aria-label="Default select example" id="entity_category" name="entity_category">
                    <option value="none" class='entity'> Select Entity</option>
                    <option value="user" class='entity'> Users</option>
                    <option value="pet" class='entity'> Pets</option>
                    <option value="shop_prod" class='entity'> Shops-Products</option>
                    <!-- <option value="clinic" class='entity'> Clinics</option> -->
                    <option value="deledopted" class='entity'> Deledopted</option>
                </select>


                <!-- when Users is selected -->
                <div class="user_category">
                    <select class="form-select btn  user_menu" aria-label="Default select example" id="user_category" name="user_category">
                        <option value="pets_owned" class='entity'> Pets Owned</option>
                        <option value="not_owned" class='entity'> Not Owned</option>
                        <option value="unverified" class='entity'> ID Unverified</option>
                        <option value="verified" class='entity'>ID Verified</option>
                    </select>
                </div>

                <!-- WHEN PETS IS SELECTED -->

                <select class="form-select btn  pet_menu" aria-label="Default select example" id="pet_menu" name="pet_menu">
                    <option value="pet_type" class='entity'> Pet Category</option>
                    <option value="birthyear" class='entity'> Birthyear</option>
                    <option value="sex" class='entity'> Sex</option>
                    <option value="vaccinated" class='entity'>Vaccinated</option>
                    <option value="owner" class='entity'>Owner</option>
                </select>

                <!-- animal_type -->
                <select class="form-select btn  pet_type" aria-label="Default select example" id="pet_type" name="pet_type">
                    <option value="all_pets" class='entity'>All Pets</option>
                    <?php
                    $sql = "SELECT * FROM pet_category";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                    ?>
                            <option value="<?php echo $row['animal_type']; ?>" class='entity'><?php echo $row['animal_type']; ?></option>
                    <?php

                        }
                    }
                    ?>

                </select>

                <!-- breed -->
                <select class="form-select btn  breed" aria-label="Default select example" id="breed" name="breed">
                    <option value="all_breeds" class='entity'>All Breeds</option>
                </select>

                <!-- birthyear -->
                <select class="form-select btn  birthyear" aria-label="Default select example" id="birthyear" name="birthyear">
                    <option value="all_years" class='entity'>All Years</option>
                    <?php
                    $year = (int) date("Y");
                    while ($year >= 2005) {
                    ?>
                        <option value="<?php echo $year; ?>" class='entity'><?php echo $year; ?></option>
                    <?php
                        $year--;
                    }
                    ?>
                </select>

                <!-- sex -->
                <select class="form-select btn  sex" aria-label="Default select example" id="sex" name="sex">
                    <option value="both" class='entity'>Both</option>
                    <option value="male" class='entity'>Male</option>
                    <option value="female" class='entity'>Female</option>
                </select>

                <!-- vaccinated-->
                <select class="form-select btn  vaccinated" aria-label="Default select example" id="vaccinated" name="vaccinated">
                    <option value="both" class='entity'>Both</option>
                    <option value="yes" class='entity'>Yes</option>
                    <option value="no" class='entity'>No</option>
                </select>



                <!-- shop names  -->
                <select class="form-select btn shop_name" aria-label="Default select example" id="shop_name" name="shop_name">
                    <!-- just used .get_muni_name for the css -->
                    <option value="all_shops" class='get_muni_name'>All Shops</option>
                    <?php
                    // select all municipality
                    $sql = "SELECT shop_name FROM shop;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            $get_shop_name = $row["shop_name"];
                            echo "<option value='$get_shop_name' class='get_muni_name'>$get_shop_name</option>";
                        }
                    } else {
                        // echo "0 results";
                    }

                    ?>
                </select>

                <!-- deledopted-->
                <select class="form-select btn  deledopted" aria-label="Default select example" id="deledopted" name="deledopted">
                    <option value="pet_details" class='entity'>Pet Details</option>
                    <option value="owner" class='entity'>Owner</option>
                </select>

                <!-- municipality category  -->
                <select class="form-select btn municipality" aria-label="Default select example" id="municipality" name="municipality">
                    <option value="all_muni" class='get_muni_name'>All Municipalites</option>
                    <?php
                    // select all municipality
                    $sql = "SELECT muni_name FROM municipality;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            $get_muni_name = $row["muni_name"];
                            echo "<option value='$get_muni_name' class='get_muni_name'>$get_muni_name</option>";
                        }
                    } else {
                        // echo "0 results";
                    }

                    ?>
                </select>




                <!-- Search the name of the animal -->
                <div class="middle-search">
                    <div class="d-flex flex-wrap justify-content-center pet-list">
                        <input class="form-control  type-search " type="search" placeholder="Search" aria-label="Search" id="type-search">
                        <!-- <button class="btn btn-outline-success press-search" type="submit">Search</button> -->
                    </div>
                </div>


            </div>


            <div class="grid-container">
                <!-- Users Entity Display -->

                <!-- This is pets_owned -->
                <div class="col_users">
                    <div>User ID</div>
                    <div>Username</div>
                    <div>Fname</div>
                    <div>Lname</div>
                    <div>Municipality</div>
                    <div>Pets Owned</div>
                </div>
                <!-- this is for not owned -->
                <div class="not_owned">
                    <div>User ID</div>
                    <div>Username</div>
                    <div>Fname</div>
                    <div>Lname</div>
                    <div>Municipality</div>
                    <!-- <div>Pets Owned</div> -->
                </div>

                <!-- This is for both unverified and verified -->
                <div class="unver_ver">
                    <div>User ID</div>
                    <div>Username</div>
                    <div>Fname</div>
                    <div>Lname</div>
                    <div>Municipality</div>
                </div>


                <!-- PET ENTITY DISPLAY -->

                <!-- pet category -->
                <div class="pet_category">
                    <div>Pet ID</div>
                    <div>Pet Name</div>
                    <div>Pet Type</div>
                    <div>Breed</div>
                    <div>Municipality</div>
                </div>

                <!-- birthyear -->
                <div class="birthyear_title">
                    <div>Pet ID</div>
                    <div>Pet Name</div>
                    <div>Birthyear</div>
                    <div>Municipality</div>
                </div>

                <!-- sex -->
                <div class="sex_title">
                    <div>Pet ID</div>
                    <div>Pet Name</div>
                    <div>Sex</div>
                    <div>Municipality</div>
                </div>

                <!-- vaccinated -->
                <div class="vaccinated_title">
                    <div>Pet ID</div>
                    <div>Pet Name</div>
                    <div>Vaccinated</div>
                    <div>Municipality</div>
                </div>

                <!-- owner -->
                <div class="owner_title">
                    <div>Pet ID</div>
                    <div>Pet Name</div>
                    <div>Owner Username</div>
                    <div>Owner Fname</div>
                    <div>Owner Lname</div>
                    <div>Municipality</div>
                </div>

                <!-- SHOP_PROD -->
                <div class="shop_prod_title">
                    <div>Product ID</div>
                    <div>Product Name</div>
                    <div>Price</div>
                    <div>Shop ID</div>
                    <div>Shop Name</div>
                    <div>Municipality</div>
                    <div>Pet Type</div>
                </div>

                <!-- DELEDOPTED -->

                <!-- pet details -->
                <div class="pet_det_title">
                    <div>Pet ID</div>
                    <div>Pet Name</div>
                    <div>Birthyear</div>
                    <div>Sex</div>
                    <div>Vaccinated</div>
                    <div>Pet Type</div>
                    <div>Breed</div>
                </div>
                <!-- pet owner -->
                <div class="dele_owner_title">
                    <div>Pet ID</div>
                    <div>Pet Name</div>
                    <div>Owner Username</div>
                    <div>Owner Fname</div>
                    <div>Owner Lname</div>
                    <div>Municipality</div>
                    <div>Created At</div>
                </div>
            </div>
        </div>
    </div>
    <!-- add color to link item of this page on the header -->
    <script>
        function navbarColor() {
            document.getElementById('reports').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
        }
        navbarColor();
    </script>

    <!-- JS for the filtering -->
    <script src="../js/admin_dashboard.js" type="module"></script>
    <script src="../js/admin_reports_pets.js" type="module"></script>
    <script src="../js/admin_reports_shop_prod.js" type="module"></script>
    <script src="../js/admin_reports_deledopted.js" type="module"></script>
</body>

</html>

<?php
$conn->close();
?>