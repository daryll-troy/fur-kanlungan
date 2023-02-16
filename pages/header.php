

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
</head>

<body>
    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ipantay-nav">
            <div class="container-fluid ipantay-cont-fluid">

                <a href="dashboard.php">
                    <img src="../images/logo.gif" alt="logo" class="logo me-4">
                </a>
                <a href="dashboard.php"> <span id="fur-kanlungan">Fur-Kanlungan</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse isagad-hover" id="navbarScroll">
                    <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll">
                        <li class="nav-item" id="product_list">
                            <a class="nav-link" href="product_list.php"><span class="puti-header">Products</span></a>
                        </li>
                        <li class="nav-item" id="shop_list">
                            <a class="nav-link" href="shop_list.php"><span class="puti-header">Shops</span></a>
                        </li>
                        <li class="nav-item" id="clinic_list">
                            <a class="nav-link" href="clinic_list.php"><span class="puti-header">Clinics</span></a>
                        </li>
                        <li class="nav-item" id="donation">
                            <a class="nav-link" href="donation.php"><span class="puti-header">Donate</span></a>
                        </li>
                        <li class="nav-item" id="chats">
                            <a class="nav-link" aria-current="page" href="chat_list.php"> <span class="puti-header">Chats</span></a></a>
                        </li>
                        <li class="nav-item " id="my_pets">
                            <a class="nav-link" href="my_pets.php"><span class="puti-header ">Posted</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="puti-header igitna-pic">
                                    <!-- Get profile picture -->
                                    <?php

                                    $getID = $_SESSION['userID'];
                                    $prof_pic = "";
                                    $fname = "";
                                    $getPhoto = "SELECT prof_pic, fname FROM users WHERE userID = '$getID'";
                                    $result = $conn->query($getPhoto);
                                    if ($result->num_rows > 0) {
                                        // fetch the image file name 
                                        while ($row = $result->fetch_assoc()) {
                                            $prof_pic = $row['prof_pic'];
                                            $fname = $row['fname'];
                                        }
                                    }
                                    ?>

                                    <img src="../images/prof_pics/<?php echo $prof_pic; ?>" alt="" srcset="" id="profPic">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarScrollingDropdown">


                                <li id="profile"><a id="profile_atag" class="dropdown-item" href="profile.php?user_id=<?php echo $_SESSION['userID'];?>" style="margin-left: 0; text-transform: capitalize; font-weight:bold; font-size: 1.1em;"><?php echo $fname; ?></a></li>
                                <li id="pet_receive"><a id="pet_receive_atag" class="dropdown-item" href="pet_receive.php" style="margin-left: 0;">Receive Pets</a></li>
                                <li id="history"><a id="history_atag" class="dropdown-item" href="history.php" style="margin-left: 0;">History</a></li>
                                <!-- <li><a class="dropdown-item" href="#" style="margin-left: 0;">Profile</a></li> -->
                                <li>
                                    <hr class="dropdown-divider" style="color: black;">
                                </li>
                                <li><a class="dropdown-item" href="logout.php" style="margin-left: 0;">Sign Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>


</body>

</html>