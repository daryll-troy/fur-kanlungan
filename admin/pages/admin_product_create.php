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
    <title>Create product | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for admin_product.php.php -->
    <!-- <link rel="stylesheet" href="../css/admin_product.css"> -->
    <link rel="stylesheet" href="../css/admin_product_create.css">
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
    <div class="product min-vh-100">
        <div class="list_product">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="create_pet_form" method="post" enctype="multipart/form-data">
                <div class="form">
                    <div class="product_short_details">
                        <div> <img src="../../images/backTo.png" id="backTo" onclick="history.back()"></div>
                        <div id="title">
                            <h4 class="mb-4">Create product</h4>
                        </div>

                        <!-- product name -->
                        <div class="name_cont">
                            <label for="name" class="form-label  mt-2">Name</label>
                            <input type="text" class="form-control" id="name" placeholder=" Name" name="name">
                            <div> <small id="name_err" style="color: red;"></small></div>
                        </div>


                        <!-- price -->
                        <div class="price_cont">
                            <label for="price" class="form-label  mt-2">price</label>
                            <input type="text" class="form-control" id="price" placeholder=" price" name="price">
                            <div> <small id="price_err" style="color: red;"></small></div>
                        </div>


                        <!-- pet_category -->
                        <label for="pet_category" class="form-label">pet_category</label>
                        <select class="form-select btn pet_category" aria-label="Default select example" id="pet_category" name="pet_category">
                            <option value="none">Select pet_category</option>
                            <?php
                            // select all pet_category
                            $sql = "SELECT animal_type FROM pet_category;";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $get_animal_type = $row["animal_type"];
                                    echo "<option value='$get_animal_type' id='get_animal_type'>$get_animal_type</option>";
                                }
                            } else {
                                echo "<option value='void' id='get_animal_type'>Void</option>";
                            }

                            ?>
                        </select>

                        <!-- shop name -->
                        <label for="shop_name" class="form-label">Shop Name</label>
                        <select class="form-select btn shop_name" aria-label="Default select example" id="shop_name" name="shop_name">
                            <option value="none">Select Shop Name</option>
                            <?php
                            // select all shop_name
                            $sql = "SELECT shop_name FROM shop;";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $shop_name = $row["shop_name"];
                            ?>
                                    <option value='shop_name' id='shop_name'><?php echo $shop_name; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <!-- services -->

                    <div class="description">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('product').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
    </script>

    <!-- map script  -->
    <!-- <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script> -->
</body>

</html>

<?php $conn->close(); ?>