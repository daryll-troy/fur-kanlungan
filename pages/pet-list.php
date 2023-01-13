<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Browse Pets Section -->
    <section class="pet-list min-vh-100" id="pet-list">
        <div class="all-wrapper">
            <div class="container flex-wrap filter wrap-search">
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

                    <select class="form-select btn breed breed_category" aria-label="Default select example" id="breed" name="breed">
                        <option value="none" class='each_breed'> All Breeds</option>
                    </select>

                </div>

                <!-- Search the name of the animal -->
                <nav class="navbar navbar-light bg-light mt-5 search-nav">
                    <div class="container-fluid search-nav middle-search">
                        <form class="d-flex flex-wrap justify-content-center pet-list">
                            <input class="form-control me-2 type-search " type="search" placeholder="Search Name" aria-label="Search">
                            <button class="btn btn-outline-success press-search" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
            <!-- card containers of pets -->
            <div class="container mt-5 pb-5 pet-container">
                <div class="row g-4 row_of_col">

                    <?php
                    // get all pets
                    $sql = "SELECT * FROM pet";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            // get the breed name to display
                            $bcID = $row['bcID'];
                            $bc_sql = "SELECT breed FROM breed_category WHERE bcID = ?";
                            $stmt = $conn->prepare($bc_sql);
                            $stmt->bind_param("i", $bcID);
                            $stmt->execute();
                            $bc_result = $stmt->get_result();
                            $bc = $bc_result->fetch_assoc();

                            // get 1 pic file name
                            $petID = $row['petID'];
                            $petPho_sql = "SELECT photo FROM pet_photo WHERE petID = ? ORDER BY petPhoID DESC LIMIT 1";
                            $stmt = $conn->prepare($petPho_sql);
                            $stmt->bind_param("i", $petID);
                            $stmt->execute();
                            $photo_result = $stmt->get_result();
                            $photo = $photo_result->fetch_assoc();
                    ?>
                            <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>
                                <a href='pet_info.php?pet_id=<?php echo $petID ?>' style='text-decoration: none; color:black;' class="col_a_tag">
                                    <div class='card' style='width: 18rem; '>
                                        <div class='d-flex justify-content-center ipa-grey'>
                                            <img src='../images/pet_pics/<?php echo $photo['photo']; ?>' class='card-img-top img-fluid' alt='image'>
                                        </div>
                                        <div class='card-body'>
                                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span><?php echo $row['name']; ?></p>
                                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Gender: </span><?php echo $row['sex']; ?></p>
                                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Age: </span><?php echo date('Y') -  $row['age']; ?></p>
                                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold;'>Breed: </span><?php echo $bc['breed']; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php
                        }
                    } else {
                        ?>
                        <!-- if no users have posted any pet -->
                        <div class="no_posted_pets col-12 col-md-12 col-lg-12 d-flex justify-content-center black-border" style="color: aliceblue; font-size:2em">No Pets Posted</div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- Pagination for the list of pets -->
            <!-- <div class="page-number">
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex flex-wrap justify-content-center no-margin-bottom">
                        <li class="page-item">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">30</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div> -->
        </div>
    </section>


    <script src="../js/pet_list.js"></script>
</body>

</html>