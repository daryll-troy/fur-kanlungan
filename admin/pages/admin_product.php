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
    <title>Posted product | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../../css/css-resets.css">
    <!-- css for admin_product.php.php -->
    <link rel="stylesheet" href="../css/admin_product.css">

    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/admin_header.css">
    <!-- update icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</head>

<body>
    <?php include_once 'admin_header.php'; ?>
    <div class="product min-vh-100">
        <div class="list_product">

            <div class="create_product" onclick="goToCreate()">
                <img src="../../images/add_button.png" alt="">
            </div>

            <div id="count_products " style="font-weight: bolder; font-size: 1.5em; margin-top: 1em; color: aliceblue;">
                <?php
                $count = "SELECT COUNT(prodID) AS count FROM product";
                $res = $conn->query($count);
                $num =  $res->fetch_assoc();
                echo $num['count'] . " Product(s) Created";
                ?>
            </div>
            
            <div class="grid-container">

                <div class="col_title">
                    <div>Product ID</div>

                    <div>Product Name</div>
                    <div>Price </div>
                    <div>Pet Category</div>
                    <div>Shop Name</div>
                    <!-- <div>Services</div>
                <div>Description</div> -->
                    <div>Created At</div>
                    <div>Options</div>
                </div>
                <?php
                // get all products
                $sql = "SELECT * FROM product ORDER BY prod_name";
                $query = $conn->query($sql);
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                ?>
                        <!-- <a href="admin_product_pic.php" id="a_whole"> -->
                        <div class="each_product">
                            <div class="productID"><?php echo $row['prodID']; ?></div>
                            <div class="product_name"><?php echo $row['prod_name']; ?></div>
                            <div class="price"> <span>&#8369;</span><?php echo $row['price']; ?>.00</div>

                            <!-- // select the pet_category -->
                            <?php

                            $pcID = $row['pcID'];
                            $sql = "SELECT pc.animal_type FROM pet_category AS pc
                            INNER JOIN product AS pro ON pro.pcID = pc.pcID WHERE pc.pcID = $pcID LIMIT 1
                            ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($animal_type = $result->fetch_assoc()) {
                            ?>
                                    <div class="animal_type"><?php echo $animal_type['animal_type']; ?></div>
                            <?php
                                }
                            }
                            ?>
                            <!--// select the shop name  -->
                            <?php

                            $shopID = $row['shopID'];
                            $sql = "SELECT shop.shop_name FROM shop 
                            INNER JOIN product ON product.shopId = shop.shopID WHERE product.shopID = $shopID LIMIT 1
                            ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($shopName = $result->fetch_assoc()) {
                            ?>
                                    <div class="shop_name"><?php echo $shopName['shop_name']; ?></div>
                            <?php
                                }
                            }
                            ?>




                            <div class="date_time"><?php echo $row['date_time']; ?></div>
                            <div class="btn_delete">
                                <span class='material-symbols-outlined update_pet_img' id='delete_pet_img' onclick="goToUpdateProduct(<?php echo $row['prodID']; ?>)">
                                    update
                                </span>
                                <span class='material-symbols-outlined delete_pet_img' id='delete_pet_img' onclick="goToDeleteproduct(<?php echo $row['prodID']; ?>)">
                                    delete
                                </span>
                                <span onclick="goToproductPic(<?php echo $row['prodID']; ?>)">
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
            document.getElementById('product').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
        }
        navbarColor();

        function goToCreate() {
            window.location.href = "admin_product_create.php";
        }

        function goToUpdateProduct(shopID) {
            window.location.href = "admin_product_update.php?prodID=" + shopID;
        }

        function goToproductPic(productID) {
            window.location.href = "admin_product_photos.php?prodID=" + productID;
        }

        function goToDeleteproduct(productID) {
            window.location.href = "admin_product_delete.php?prodID=" + productID;
        }
    </script>



</body>

</html>

<?php $conn->close(); ?>