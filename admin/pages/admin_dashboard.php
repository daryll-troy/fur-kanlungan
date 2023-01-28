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
                    <option value="product" class='entity'> Products</option>
                    <option value="clinic" class='entity'> Clinics</option>
                    <option value="shop" class='entity'> Shops</option>
                </select>

                <!-- when Users is selected -->
                <div class="user_category">

                    <select class="form-select btn  user_menu" aria-label="Default select example" id="user_category" name="user_category">
                        <option value="pets_owned" class='entity'> Pets Owned</option>
                        <option value="unverified" class='entity'> ID Unverified</option>
                        <option value="verified" class='entity'>ID Verified</option>
                    </select>
                </div>



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
                <!-- <nav class="navbar navbar-light bg-light search-nav"> -->
                <div class="middle-search">
                    <form class="d-flex flex-wrap justify-content-center pet-list">
                        <input class="form-control  type-search " type="search" placeholder="Search" aria-label="Search" id="type-search">
                        <!-- <button class="btn btn-outline-success press-search" type="submit">Search</button> -->
                    </form>
                </div>
                <!-- </nav> -->

            </div>


            <div class="grid-container">
                <!-- Users Entity Display -->
                <div class="col_users">
                    <div>User ID</div>
                    <div>Username</div>
                    <div>Fname</div>
                    <div>Lname</div>
                    <div>Municipality</div>
                    <div>Pets Owned</div>
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
    <script src="../js/admin_dashboard.js"></script>
</body>

</html>