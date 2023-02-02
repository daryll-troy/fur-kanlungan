<?php
include "../../pages/connect.php";
session_start();

if (!isset($_SESSION['adminID'])) {
    header("location: admin-login.php");
    exit();
}

?>


<?php

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../../css/css-resets.css">
    <!-- css for admin_user.php.php -->
    <link rel="stylesheet" href="../css/admin_user.css">

    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/admin_header.css">
    <!-- update icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</head>

<body>
    <?php include_once 'admin_header.php'; ?>
    <div class="clinic min-vh-100">
        <div class="list_clinic">

          

            <div id="count_clinics" style="font-weight: bolder; font-size: 1.5em; margin-top: 1em; color: aliceblue;">
                <?php
                $count = "SELECT COUNT(userID) AS count FROM users";
                $res = $conn->query($count);
                $num =  $res->fetch_assoc();
                echo $num['count'] . " User(s) Created";
                ?>
            </div>

            <div class="grid-container">
                <div class="col_title">
                    <div>User ID</div>
                    <div>Username</div>
                    <div>Email</div>
                    <div>Fname</div>
                    <div>Lname</div>
                  
                    <div>Municipality</div>
                    <div>Verified</div>
                    <div>Created At</div>
                  
                </div>
                <?php
                // get all clinics
                $sql = "SELECT u.userID, u.username, u.email, u.fname, u.lname, m.muni_name, u.date_time, u.verified_id
                FROM users AS u 
                INNER JOIN municipality AS m
                ON m.muniID = u.muniID ORDER BY u.userID";
                $query = $conn->query($sql);
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                ?>
                       
                        <div class="each_clinic">
                            <div class="userID"><?php echo $row['userID']; ?></div>
                            <div class="username"><?php echo $row['username']; ?></div>
                            <div class="email" style="text-transform: none;"><?php echo $row['email']; ?></div>
                            <div class="fname"><?php echo $row['fname']; ?></div>
                            <div class="lname"><?php echo $row['lname']; ?></div>
                          
                          
                            <div class="municipality"><?php echo $row['muni_name']; ?></div>
                        
                            <div class="verified"><?php echo $row['verified_id']; ?></div>
                            <div class="date_time"><?php echo $row['date_time']; ?></div>
                            <div class="btn_delete">
                              
                                <span onclick="goToClinicPic(<?php echo $row['userID']; ?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                                        <path d="M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                      
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <!-- add color to link item of this page on the header -->
    <script>
        function navbarColor() {
            document.getElementById('user').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
        }
        navbarColor();

     

        function goToClinicPic(userID) {
            window.location.href = "admin_user_photos.php?userID=" + userID;
        }

    </script>



</body>

</html>

<?php $conn->close(); ?>