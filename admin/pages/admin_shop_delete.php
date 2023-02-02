<?php
include "../../pages/connect.php";
session_start();

if (!isset($_SESSION['adminID'])) {
    header("location: admin-login.php");
    exit();
}

?>

<?php
// execute when this when submitted to delete
if (isset($_POST['btn_delete_shop'])) {
    // try {

    $shopID = $_SESSION['shopID'];
    // get the prodID with this shopID 

    $sql = "SELECT prodID FROM product WHERE shopID = $shopID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $GLOBALS['prodID'] = $row['prodID'];
        }
    }

// DO NOT DELETE THIS YET, FOR NOW, I HAVE REMOVED THE FK OF product_photo to product
    //  delete the phototo of the prodID from product_photo
    // $sql = "DELETE FROM product_photo WHERE prodID = ?";
    // $result2 = $conn->prepare($sql);
    // $result2->bind_param("i",   $GLOBALS['prodID']);
    // $result2->execute();




    // delete product with this shopID from product
    $sql = "
 DELETE  FROM product WHERE shopID = ?
 ";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $_SESSION['shopID']);
    $result->execute();

    // delete photos from shop_photo
    $sql = "
          DELETE  FROM shop_photo WHERE shopID = ?
          ";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $_SESSION['shopID']);
    $result->execute();

    // delete shop
    $sql = "
          DELETE  FROM shop WHERE shopID = ?
          ";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $_SESSION['shopID']);
    $result->execute();

    $conn->close();


?>
    <script>
        window.location.href = 'admin_shop.php';
    </script>

<?php
    // unset session variable 
    unset($_SESSION["shopID"]);
    exit();
    // } catch (Exception $result) {
    // }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Shop | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for admin_shop.php.php -->
    <!-- <link rel="stylesheet" href="../css/admin_shop.css"> -->
    <link rel="stylesheet" href="../css/admin_shop_delete.css">
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="create_shop_form" method="post">
                <div class="form">
                    <div> <img src="../../images/backTo.png" id="backTo" onclick="history.back()"></div>
                    <div class="delete_cont">

                        <div id="title">
                            <h4 class="mb-4">Delete

                                <?php
                                // display the name of the shop

                                $getID = $_GET['shopID'];
                                $_SESSION['shopID'] = $_GET['shopID'];
                                $sql = "SELECT shop_name FROM shop WHERE shopID= '$getID'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo $row['shop_name']  . "?";
                                    }
                                } else {
                                    $conn->close();
                                    echo "<script>alert('Oops! Technical Error')</script>";
                                    echo "<script>
                                                            window.location.href='admin_shop.php';
                                                            </script>";
                                    exit();
                                }
                                ?>
                            </h4>
                        </div>


                        <!-- delete and cancel button -->
                        <div class=" cancel_delete_button mb-2">

                            <input type="submit" class="btn btn-primary btn_delete_shop me-4" name="btn_delete_shop" id="btn_delete_shop" value="Delete">

                            <input type="button" class="btn btn-primary btn_cancel_shop" name="btn_cancel_shop" id="btn_cancel_shop" value="Cancel" onclick="history.back()">

                        </div>


                    </div>
            </form>
        </div>
        </form>
    </div>
    </div>

    <script>
        document.getElementById('shop').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
    </script>


</body>

</html>

<?php $conn->close(); ?>

</html>