<?php
include 'connect.php';
session_start();

// check if the user had already logged in
if (!isset($_SESSION['userID'])) {
    $conn->close();
    header("location: ../index.php");
    exit();
}
?>

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
    <!-- css for product_list.php-->
    <link rel="stylesheet" href="../css/product_list.css">
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <!-- Browse Pets Section -->
    <section class="pet-list min-vh-100" id="pet-list">
        <div class="all-wrapper">
            <div class="container flex-wrap filter wrap-search">

                <!-- Search the name of the animal -->
                <nav class="navbar navbar-light bg-light mt-5 search-nav">
                    <div class="container-fluid search-nav middle-search">
                        <div class="d-flex flex-wrap justify-content-center pet-list">
                            <input class="form-control  type-search " type="search" placeholder="Search" aria-label="Search" id="type-search">
                            <!-- <button class="btn btn-outline-success press-search" type="submit">Search</button> -->
                        </div>

                    </div>

                </nav>

                <!-- Dropdown to filter the animal category -->
                <div class="dropdown mt-5 d-flex justify-content-center ">
                    <select class="form-select btn pet_category" aria-label="Default select example" id="pet_category" name="pet_category">
                        <option value="none" class='get_animal_type'> All Pets</option>
                        <?php
                        // select all pet category
                        $sql = "SELECT pcID, animal_type FROM pet_category ORDER BY animal_type";
                        $result = mysqli_query($conn, $sql);
                        // $pcID = "";
                        $get_animal_type = "";
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {

                                $get_animal_type = $row["animal_type"];
                                echo "<option value='$get_animal_type' class='get_animal_type'>$get_animal_type</option>";
                            }
                        } else {
                            echo "
                                 <script> alert('Error: database connection failure');</script>
                            ";
                        }


                        ?>
                    </select>
                </div>

                <!-- Select the breed -->
                <!-- breed -->
                <div class="breed_cont dropdown mt-5 d-flex justify-content-center ">

                    <select class="form-select btn breed" aria-label="Default select example" id="breed" name="breed">
                        <option value="none" class='each_breed'>All Shops</option>
                        <?php
                        $sql = "SELECT shop_name, shopID FROM shop";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row['shop_name'] ?>" class='<?php echo $row['shop_name'] ?>'><?php echo $row['shop_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>


            </div>
            <!-- card containers of pets -->
            <div class="container mt-5 pb-5 pet-container">
                <div class="row g-4 row_of_col">

                    <?php
                    // get all pets
                    $sql = "SELECT p.prodID, p.prod_name, p.price, s.shop_name, pc.animal_type FROM product AS p 
                    INNER JOIN shop AS s ON s.shopID = p.shopID
                    INNER JOIN pet_category As pc ON pc.pcID = p.pcID
                    ORDER BY prod_name";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // get 1 pic file name (latest uploaded)
                            $petID = $row['prodID'];
                            $petPho_sql = "SELECT photo FROM product_photo WHERE prodID = ? ORDER BY prodphoID DESC LIMIT 1";
                            $stmt = $conn->prepare($petPho_sql);
                            $stmt->bind_param("i", $petID);
                            $stmt->execute();
                            $photo_result = $stmt->get_result();
                            $photo = $photo_result->fetch_assoc();
                    ?>
                            <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>
                                <a href='product_info.php?product_id=<?php echo $petID ?>' style='text-decoration: none; color:black;' class="col_a_tag">
                                    <div class='card' style='width: 18rem; '>
                                        <div class='d-flex justify-content-center ipa-grey'>
                                            <img src='../images/product_pics/<?php echo $photo['photo']; ?>' class='card-img-top img-fluid' alt='image'>
                                        </div>
                                        <div class='card-body'>
                                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span><?php echo $row['prod_name']; ?></p>
                                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Price: ₱</span><?php echo $row['price']; ?></p>
                                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Shop: </span><?php echo  $row['shop_name']; ?></p>
                                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold;'>Pet Type: </span><?php echo $row['animal_type']; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php
                        }
                    } else {
                        ?>
                        <!-- if no users have posted any pet -->
                        <div class="no_posted_pets col-12 col-md-12 col-lg-12 d-flex justify-content-center black-border" style="color: aliceblue; font-size:2em">No Products Posted</div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </section>

    <!-- footer -->
    <?php include 'footer.php'; ?>

    <!-- add color to link item of this page on the header -->
    <script>
        function navbarColor() {
            document.getElementById('product_list').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
        }
        navbarColor();
    </script>

    <script src="../js/product_list.js"></script>
</body>

</html>