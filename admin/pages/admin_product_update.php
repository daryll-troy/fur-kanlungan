<?php
include "../../pages/connect.php";
session_start();

if (!isset($_SESSION['adminID'])) {
    header("location: admin-login.php");
    exit();
}

?>

<!-- Update the product -->
<?php



if (isset($_POST['btn_update_product'])) {
    // get the post variables
    $name = trim(htmlspecialchars(strtolower($_POST['name'])));
    $price = trim(htmlspecialchars(strtolower($_POST['price'])));
    $pet_category = trim(htmlspecialchars(strtolower($_POST['pet_category'])));
    $shop_name = trim(htmlspecialchars(strtolower($_POST['shop_name'])));
    $description = trim(htmlspecialchars(strtolower($_POST['description'])));


    $shopID = $pcID = "";

    //  get the shop id
    $sql = "SELECT shopID from shop WHERE shop_name = '$shop_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $shopID = $row['shopID'];
        }
    } else {
?>
        <script>
            alert("Failed getting the shopID")
        </script>
    <?php
    }



    // get the pcID
    $sql = "SELECT pcID from pet_category WHERE animal_type = '$pet_category'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pcID = $row['pcID'];
        }
    } else {
    ?>
        <script>
            alert("Failed getting the pcID")
        </script>
<?php
    }

    // check file size
    if ($_FILES['upload_pics']['size'] > 5000000) {

        try {

            //    update query on product table
            $sql = "UPDATE product SET prod_name = ?, price = ?, description = ?, shopID = ?, pcID = ? WHERE prodID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param(
                "sisiii",
                $name,
                $price,
                $description,
                $shopID,
                $pcID,
                $_SESSION['prodID']
            );
            $stmt->execute();
        } catch (Exception $stmt) {
            echo "Ang error ay: " . $conn->error;
        } finally {
            // File upload configuration 
            $targetDir = "C:/xampp/htdocs/fur-kanlungan/images/product_pics/";
            $allowTypes = array('jpg', 'png', 'jpeg');
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
            $upload_pics = array_filter($_FILES['upload_pics']['name']);

            // get each file name in $_FILES
            foreach ($_FILES['upload_pics']['name'] as $key => $val) {
                // File upload path 
                $fileName = basename($_FILES['upload_pics']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;

                // Check whether file type is valid 
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server 
                    if (move_uploaded_file($_FILES["upload_pics"]["tmp_name"][$key], $targetFilePath)) {


                        // upload product photos to product_photo
                        $stmt = $conn->prepare("INSERT INTO product_photo(photo, prodID) VALUES ( ?, ?)");
                        $stmt->bind_param("si", $fileName, $_SESSION['prodID']);
                        $stmt->execute();
                    } else {
                        $errorUpload .= $_FILES['upload_pics']['name'][$key] . ' | ';
                        echo $errorUpload;
                    }
                }

                $conn->close();
                echo "<script>
                window.location.href='admin_product.php';
                </script>";
                exit();
            }
        }
    } else {
        echo '<script>alert("File size limit: 5MB")</script>';
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for admin_product_update.php.php -->
    <link rel="stylesheet" href="../css/admin_product_update.css">
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
    <?php //include_once 'admin_header.php'; 
    ?>
    <div class="product min-vh-100">
        <div class="list_product">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="update_pet_form" method="post" enctype="multipart/form-data">

                <div class="form">
                    <div class="product_short_details">
                        <div> <img src="../../images/backTo.png" id="backTo" onclick="window.location.href = 'admin_product.php'"></div>
                        <div id="title" style="text-transform:capitalize">
                            <h4 class="mb-4">Update
                                <?php
                                $_SESSION['prodID'] = $_GET['prodID'];

                                $prodID = $_GET['prodID'];
                                $prod_name = $price = $pcID  = $description = "";

                                //    get prod name since you can't pass pass the prod name as a get variable using javascript
                                $sql = "SELECT * FROM product WHERE prodID = '$prodID'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // display the product name in the input field
                                        echo  $row['prod_name'] ;
                                        // get and store the other values of of the rest of the columns
                                        $prod_name = $row['prod_name'];
                                        $price = $row['price'];
                                        $description = $row['description'];
                                        $pcID = $row['pcID'];
                                    }
                                } else {
                                    echo "(prod_name not retrieved)";
                                }
                                ?>
                            </h4>
                        </div>

                        <!-- product name -->
                        <div class="name_cont">
                            <label for="name" class="form-label  mt-2">Name</label>
                            <input type="text" class="form-control" id="name" placeholder=" Name" name="name" value="<?php echo $prod_name; ?>">
                            <div> <small id="name_err" style="color: red;"></small></div>
                        </div>

                        <!-- price -->
                        <div class="price_cont">
                            <label for="price" class="form-label  mt-2">price</label>
                            <input type="text" class="form-control" id="price" placeholder=" price" name="price" value="<?php echo $price; ?>">
                            <div> <small id="price_err" style="color: red;"></small></div>
                        </div>


                        <!-- pet_category -->
                        <label for="pet_category" class="form-label">pet_category</label>
                        <select class="form-select btn pet_category" aria-label="Default select example" id="pet_category" name="pet_category">

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

                            <?php
                            // select all shop_name
                            $sql = "SELECT shop_name FROM shop;";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $shop_name = $row["shop_name"];
                            ?>
                                    <option value='<?php echo $shop_name; ?> ' id='shop_name'><?php echo $shop_name; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>

                        <!-- Upload pics of the product -->
                        <label for="upload_pics" class="form-label mt-2">Upload Photos</label>
                        <input class=" form-control" type="file" id="upload_pics" name="upload_pics[]" multiple accept=".jpg, .png, .jpeg">
                        <div class="mb-2"> <small id="upload_pics_err" style="color: red;"></small></div>

                    </div>

                    <div class="description">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10"><?php echo $description; ?></textarea>
                    </div>
                </div>

                <!-- update button -->
                <div class="update_button  mt-4">
                    <input type="submit" class="btn btn-primary btn_update_product" name="btn_update_product" id="btn_update_product" value="update">
                </div>
        </div>

        </form>
    </div>
    </div>

</body>

</html>