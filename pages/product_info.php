<?php
// connect to database
include 'connect.php';
// start a session
session_start();
// // check if the user had already logged in
if (!isset($_SESSION['userID'])) {
    $conn->close();
    header("location: ../index.php");
    exit();
}
?>

<?php
$pet_id = "";
$photo_array = array();
$product_photo = "";
// get the petID of the clicked pet from my_pets.php
if (isset($_GET['product_id'])) {
    $pet_id = $_GET['product_id'];
    $_SESSION['product_id'] = $_GET['product_id'];

    // get the all photos of the pet
    $sql = "
    SELECT s.shop_name, pc.animal_type, p.prod_name, p.price, p.description,  pp.photo
    FROM product AS p
    INNER JOIN product_photo AS pp ON p.prodID = pp.prodID
    INNER JOIN pet_category AS pc ON pc.pcID = p.pcID
    INNER JOIN shop AS s ON s.shopID = p.shopID
    WHERE p.prodID =  '$pet_id'
                        ";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {
            $product_photo =  $row["photo"];
            $shop_name = $row['shop_name'];
            $pet_categ = $row['animal_type'];
            $prod_name = $row['prod_name'];
            $prod_description = $row['description'];
            $price = $row['price'];
            // $pet_user = $row['userID'];
        }
    } else {
        echo "<script>alert('No such Product ID!!')</script>";
        echo "<script>window.location.href = 'product_list.php'</script>";
        exit();
    }
}

// this will be used for the first pic displayed upon loading of product_info
$_SESSION['coverPetPic'] = $product_photo;



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product | Fur-Kanlungan</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- link to product_info.css -->
    <link rel="stylesheet" href="../css/product_info.css">
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <div class='pet_info min-vh-100'>
        <!-- div for pet details -->
        <div class='pet_pics'>
            <div class='previous_pic'>
                <img src='../images/backward.png' onclick="backward()">
            </div>
            <img src='' id="pet_pic">

            <div class='next_pic'>
                <img src='../images/forward.png' onclick="forward()">
            </div>
        </div>

        <!-- div for pet details-->
        <div class="pet_details">
            <div class="details_container">
               
                <div class="back_img">
                    <img src="../images/backTo.png" alt="" id="backTo" onclick="history.back()">
                    <div class="name prodName">Product <span><?php echo $prod_name ?></span></div>
                </div>
                <div id="not_desc">
                    <div class="name">Shop: <span><?php echo $shop_name ?></span></div>
                    <div class="name">Price: <span><?php echo "₱".$price ?></span></div>
                    <div class="name">Pet Type: <span><?php echo $pet_categ ?></span></div>
                    
                </div>
                <div id="desc">
                    <div class="name">Description: <br>
                       <div> <?php echo $prod_description ?></div>
                    </div>
                </div>
               
            </div>

        </div>


    </div>




    <?php include_once 'footer.php'; ?>
    <script src="../js/product_info_pic.js"></script>

    <?php $conn->close(); ?>

</body>


</html>