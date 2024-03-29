<?php
include "../../pages/connect.php";
session_start();

if (!isset($_SESSION['adminID'])) {
    header("location: admin-login.php");
    exit();
}

?>


<?php

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posted shop | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../../css/css-resets.css">
    <!-- css for admin_shop.php.php -->
    <link rel="stylesheet" href="../css/admin_shop.css">

    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/admin_header.css">

    <!-- delete icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</head>

<body>
    <?php include_once 'admin_header.php'; ?>
    <div class="shop min-vh-100">
        <div class="list_shop">

            <div class="menu_container">
                <!-- This is just to center the create button -->
                <div class="filler">

                </div>

                <div class="create_shop" onclick="goToCreate()">
                    <img src="../../images/add_button.png" alt="">
                </div>

                <!-- search bar and municipality-->
                <div class="middle-search">
                    <!-- <div class="d-flex flex-wrap justify-content-center pet-list"> -->
                    <input class="form-control  type-search " type="search" placeholder="Search" aria-label="Search" id="type-search">

                    <!-- </div> -->

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
                </div>

            </div>

            <div class="count" style="font-weight: bolder; font-size: 1.5em; margin-top: 1em; color: aliceblue;">
                <?php
                $count = "SELECT COUNT(shopID) AS count FROM shop";
                $res = $conn->query($count);
                $num =  $res->fetch_assoc();
                echo $num['count'] . " Shop(s) Created";
                ?>
            </div>

            <div class="grid-container">
                <div class="col_title">
                    <div>Shop ID</div>
                    <div>Shop Name</div>
                    <div>Email</div>
                    <div>Owner</div>
                    <div>Municipality</div>
                    <!-- <div>Location</div> -->
                    <div>Contact No.</div>
                    <div>Open Hours</div>
                    <!-- <div>Services</div>
                <div>Description</div> -->
                    <div>Created At</div>
                    <div>Options</div>
                </div>
                <?php
                // get all shops
                $sql = "SELECT * FROM shop ORDER BY shopID";
                $query = $conn->query($sql);
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                ?>
                        <!-- <a href="admin_shop_pic.php" id="a_whole"> -->
                        <div class="each_shop">
                            <div class="shopID"><?php echo $row['shopID']; ?></div>
                            <div class="shop_name"><?php echo $row['shop_name']; ?></div>
                            <div class="email" style="text-transform: none;"><?php echo $row['email']; ?></div>
                            <div class="owner"><?php echo $row['owner']; ?></div>
                            <?php
                            // Get the muni_name of its muniID
                            $muniID = $row['muniID'];
                            $sql = "SELECT muni_name FROM municipality WHERE muniID = $muniID";
                            $result = $conn->query($sql);
                            $muni_name = "";
                            if ($result->num_rows > 0) {
                                while ($getMuniName = $result->fetch_assoc()) {
                                    $muni_name = $getMuniName['muni_name'];
                                    // set muniID to session to be used in delete and view photos
                                    // $_SESSION['muniID'] = $muniID;
                                }
                            }

                            ?>
                            <div class="munID"><?php echo $muni_name; ?></div>
                            <!-- <div class="location"><?php //echo $row['location']; 
                                                        ?></div> -->
                            <div class="contact_no"><?php echo $row['contact_no']; ?></div>
                            <div class="open_hours"><?php echo $row['open_hours']; ?></div>
                            <!-- <div class="services"><?php //echo $row['services']; 
                                                        ?></div> -->
                            <!-- <div class="description"><?php //echo $row['description']; 
                                                            ?></div> -->
                            <div class="date_time"><?php echo $row['date_time']; ?></div>
                            <div class="btn_delete">
                                <span class='material-symbols-outlined update_pet_img' id='delete_pet_img' onclick="goToUpdateShop(<?php echo $row['shopID']; ?>)">
                                    update
                                </span>
                                <span class='material-symbols-outlined delete_pet_img' id='delete_pet_img' onclick="goToDeleteShop(<?php echo $row['shopID']; ?>)">
                                    delete
                                </span>
                                <span onclick="goToShopPic(<?php echo $row['shopID']; ?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                                        <path d="M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <!-- </a> -->
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <!-- add color to link item of this page on the header -->
    <script>
        function navbarColor() {
            document.getElementById('shop').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
        }
        navbarColor();

        function goToCreate() {
            window.location.href = "admin_shop_create.php";
        }

        function goToUpdateShop(shopID) {
            window.location.href = "admin_shop_update.php?shopID=" + shopID;
        }

        function goToShopPic(shopID) {
            window.location.href = "admin_shop_photos.php?shopID=" + shopID;
        }

        function goToDeleteShop(shopID) {
            window.location.href = "admin_shop_delete.php?shopID=" + shopID;
        }
    </script>


 <!-- FOR FILTERING -->
 <script src="../js/admin_shop_filter.js"></script>
</body>

</html>

<?php $conn->close(); ?>