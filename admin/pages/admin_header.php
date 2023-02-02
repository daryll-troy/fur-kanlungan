<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css reset -->
    <link rel="stylesheet" href="../../css/css-resets.css">
</head>

<body>
    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ipantay-nav">
            <div class="container-fluid ipantay-cont-fluid">

                <a href="admin_dashboard.php">
                    <img src="../../images/logo.gif" alt="logo" class="logo me-4">
                </a>
                <a href="admin_dashboard.php" ><span id="fur-kanlungan" style="font-weight: bold; color:aliceblue; font-size: 1.5em;">ADMIN</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse isagad-hover" id="navbarScroll">
                    <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll">


                        <li class="nav-item" id="product">
                            <a class="nav-link" href="admin_product.php"><span class="puti-header">Products</span></a>
                        </li>
                        <li class="nav-item" id="shop">
                            <a class="nav-link" href="admin_shop.php"><span class="puti-header">Shops</span></a>
                        </li>
                        <li class="nav-item" id="clinic">
                            <a class="nav-link" href="admin_clinic.php"><span class="puti-header">Clinics</span></a>
                        </li>
                        <li class="nav-item" id="pet">
                            <a class="nav-link" href="admin_pet.php"><span class="puti-header">Pets</span></a>
                        </li>
                        <li class="nav-item" id="user">
                            <a class="nav-link" href="admin_user.php"><span class="puti-header">Users</span></a>
                        </li>
                        <li class="nav-item " id="reports">
                            <a class="nav-link" href="admin_dashboard.php"><span class="puti-header ">Reports</span></a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="puti-header igitna-pic">


                                    <img src="../images/admin.png" alt="" srcset="" id="profPic">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarScrollingDropdown">


                                <li><a class="dropdown-item" href="#" style="margin-left: 0; text-transform: capitalize; font-weight:bold; font-size: 1.1em;"><?php
                                                                                                                                                                echo $_SESSION['username'];
                                                                                                                                                                ?>
                                    </a></li>
                                <hr class="dropdown-divider" style="color: black;">
                        </li>
                        <li><a class="dropdown-item" href="admin_logout.php" style="margin-left: 0;">Sign Out</a></li>
                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>


</body>

</html>