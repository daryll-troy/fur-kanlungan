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
    <title>Create Shop | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for admin_shop.php.php -->
    <!-- <link rel="stylesheet" href="../css/admin_shop.css"> -->
    <link rel="stylesheet" href="../css/admin_shop_create.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/admin_header.css">
    <!-- update icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- map -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/map.css" /> -->
    <!-- map js -->
    <!-- <script type="module" src="../js/map.js"></script> -->
</head>


<body>
    <?php include_once 'admin_header.php'; ?>
    <div class="shop min-vh-100">
        <div class="list_shop">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="create_pet_form" method="post" enctype="multipart/form-data">
                <div class="form">
                    <div class="shop_short_details">
                        <div> <img src="../../images/backTo.png" id="backTo" onclick="history.back()"></div>
                        <div>
                            <h4 class="mb-4">Create Shop</h4>
                        </div>

                        <!-- shop name -->
                        <div class="name_cont">
                            <label for="name" class="form-label  mt-2">Name</label>
                            <input type="text" class="form-control" id="name" placeholder=" Name" name="name">
                            <div> <small id="name_err" style="color: red;"></small></div>
                        </div>

                        <!-- email -->
                        <div class="email_cont">
                            <label for="email" class="form-label  mt-2">Email</label>
                            <input type="text" class="form-control" id="email" placeholder=" email" name="email">
                            <div> <small id="email_err" style="color: red;"></small></div>
                        </div>

                        <!-- owner -->
                        <div class="owner_cont">
                            <label for="owner" class="form-label  mt-2">Owner</label>
                            <input type="text" class="form-control" id="owner" placeholder=" owner" name="owner">
                            <div> <small id="owner_err" style="color: red;"></small></div>
                        </div>

                        <!-- municipality -->
                        <label for="municipality" class="form-label">Municipality</label>
                        <select class="form-select btn municipality" aria-label="Default select example" id="municipality" name="municipality">
                            <option value="none">Select municipality</option>
                            <?php
                            // select all municipality
                            $sql = "SELECT muni_name FROM municipality;";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $get_muni_name = $row["muni_name"];
                                    echo "<option value='$get_muni_name' id='get_muni_name'>$get_muni_name</option>";
                                }
                            } else {
                                // echo "0 results";
                            }

                            ?>
                            <!-- MAP -->
                            <!-- <div id="map"></div> -->



                        </select>

                        <!-- contact -->
                        <div class="contact_cont">
                            <label for="contact" class="form-label  mt-2">Contact</label>
                            <input type="text" class="form-control" id="contact" placeholder=" contact" name="contact">
                            <div> <small id="contact_err" style="color: red;"></small></div>
                        </div>

                        <!-- open_hours -->
                        <div class="open_hours_cont">
                            <label for="open_hours" class="form-label  mt-2">Open Hours</label>
                            <input type="text" class="form-control" id="open_hours" placeholder=" open_hours" name="open_hours">
                            <div> <small id="open_hours_err" style="color: red;"></small></div>
                        </div>



                    </div>
                    <div class="services">
                        <textarea name="services" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="description">
                        <textarea name="description" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function navbarColor() {
            document.getElementById('shop').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
        }
    </script>

    <!-- map script  -->
    <!-- <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script> -->
</body>

</html>

<?php $conn->close(); ?>