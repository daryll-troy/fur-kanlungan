<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- Browse Pets Section -->
    <section class="pet-list min-vh-100" id="pet-list">
        <div class="all-wrapper">
            <div class="container flex-wrap filter wrap-search">
                <!-- Dropdown to filter the animal category -->
                <div class="dropdown mt-5 d-flex justify-content-center ">
                    <button class="btn btn-secondary dropdown-toggle choose-animal " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Animal Type
                    </button>
                    <ul class="dropdown-menu animal-type" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Dogs</a></li>


                    </ul>
                </div>
                <!-- Search the name of the animal -->
                <nav class="navbar navbar-light bg-light mt-5 search-nav">
                    <div class="container-fluid search-nav middle-search">
                        <form class="d-flex flex-wrap justify-content-center pet-list">
                            <input class="form-control me-2 type-search " type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success press-search" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
            <!-- card containers of pets -->
            <div class="container mt-5 pb-5 pet-container">
                <div class="row g-4">

                    <?php

                    $sql = "SELECT * FROM pet";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();


                    while ($row = $result->fetch_assoc()) {

                        // get the breed to display
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
                            <a href="pet_info.php?pet_id=<?php echo $petID ?>" style="text-decoration: none; color:black;">
                                <div class='card' style='width: 18rem; '>
                                    <div class='d-flex justify-content-center ipa-grey'>
                                        <img src='../images/pet_pics/<?php echo $photo['photo']; ?>' class='card-img-top img-fluid' alt='image'>
                                    </div>
                                    <div class='card-body'>
                                        <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span><?php echo $row['name']; ?></p>
                                        <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Gender: </span><?php echo $row['sex']; ?></p>
                                        <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Age: </span><?php echo date("Y") -  $row['age']; ?></p>
                                        <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold;'>Breed: </span><?php echo $bc['breed']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>

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

</body>

</html>