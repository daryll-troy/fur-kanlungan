<?php
include "../../pages/connect.php";
session_start();

if (!isset($_SESSION['adminID'])) {
    header("location: admin-login.php");
    exit();
}

?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product Photos | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for admin_product.php.php -->
    <!-- <link rel="stylesheet" href="../css/admin_product.css"> -->
    <link rel="stylesheet" href="../css/admin_product_photos.css">

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
    <div class='product_info min-vh-100'>
        <!-- ALL product PHOTOS -->
        <div class='product_pics'>

            <!-- Get all the photos of this prodID -->
            <?php
            $getprodID = $_GET['prodID'];
            // query all photos of this prodID
            $sql = "SELECT photo FROM product_photo WHERE prodID = $getprodID ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="each_photo">
                        <img src="../../images/product_pics/<?php echo $row['photo'] ?>" alt="" class="each_img">
                    </div>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("Nothing to show");
                </script>
            <?php
            }
            ?>

        </div>
        <!-- SERVICES AND DESCRIPTION OF THE product -->
        <div class="serv_desc">
            <div class="pinakaTitle">
                <p> Product
                    <?php
                    // get prod name again
                    $prodID = $_GET['prodID'];
                    $sql = "SELECT prod_name FROM product WHERE prodID = $prodID";
                    $result = $conn->query($sql);
                    if ($result->num_rows >  0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['prod_name'];
                        }
                    }
                    ?>
                </p>
            </div>

            <div class="back_img">
                <img src="../../images/backTo.png" alt="" id="backTo" onclick="location.href = 'admin_product.php';">
            </div>

            <div class="description">
                <div class="bold_des">Description</div>
                <div class="paragraph">
                    <?php
                    $prodID = $_GET['prodID'];
                    $sql = "SELECT  description FROM product WHERE prodID = $prodID";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['description'];
                        }
                    } else {
                        echo "No pics available";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

</body>

</html>