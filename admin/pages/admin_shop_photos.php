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
    <title>Shop Photos | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for admin_shop.php.php -->
    <!-- <link rel="stylesheet" href="../css/admin_shop.css"> -->
    <link rel="stylesheet" href="../css/admin_shop_photos.css">

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
    <div class='shop_info min-vh-100'>
        <!-- ALL SHOP PHOTOS -->
        <div class='shop_pics'>

            <!-- Get all the photos of this shopID -->
            <?php
            $getshopID = $_GET['shopID'];
            // query all photos of this shopID
            $sql = "SELECT photo FROM shop_photo WHERE shopID = $getshopID ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="each_photo">
                        <img src="../../images/shop_pics/<?php echo $row['photo'] ?>" alt="" class="each_img">
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
        <!-- SERVICES AND DESCRIPTION OF THE SHOP -->
        <div class="serv_desc">
            <div class="pinakaTitle">
                <p> Shop
                    <?php
                    // get shop name again
                    $shopID = $_GET['shopID'];
                    $sql = "SELECT shop_name FROM shop WHERE shopID = $shopID";
                    $result = $conn->query($sql);
                    if ($result->num_rows >  0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['shop_name'];
                        }
                    }
                    ?>
                </p>
            </div>

            <div class="back_img">
                <img src="../../images/backTo.png" alt="" id="backTo" onclick="history.back()">
            </div>

            <div class="services">
                <!-- Services Title -->
                <div class="bold_serv">
                    Services
                </div>
                <!-- Get the services -->
                <div class="serv_para">
                    <?php
                    $shopID = $_GET['shopID'];
                    $sql = "SELECT services FROM shop WHERE shopID = $shopID";
                    $result = $conn->query($sql);
                    if ($result->num_rows >  0) {
                        while ($row = $result->fetch_assoc()) {
                            echo $row['services'];
                        }
                    }
                    ?>
                </div>


                <div class="description">
                    <div class="bold_desc">
                        Description
                    </div>
                    <div class="desc_para">
                        <?php
                        $shopID = $_GET['shopID'];
                        $sql = "SELECT  description FROM shop WHERE shopID = $shopID";
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
    </div>


</body>

</html>