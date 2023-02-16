<?php
// connect to database
include 'connect.php';
// start a session
session_start();
// check if the user had already logged in
if (!isset($_SESSION['userID'])) {
    $conn->close();
    header("location: ../index.php");
    exit();
} else {
    // check if verified_id != yes, then do not allow to access the chat feature
    $sql = "SELECT verified_id FROM users WHERE userID =" .  $_SESSION['userID'];
    $result = $conn->query($sql);
    $verify = $result->fetch_assoc();
    if ($verify['verified_id'] != "yes") {
        echo "<script>alert('Your account is being verified')</script>";
        echo "<script>window.location.href = 'dashboard.php'</script>";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Fur-Kanlungan</title>
    <link rel="icon" href="../images/logo.gif" type="image/gif">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for profile.php -->
    <link rel="stylesheet" href="../css/profile.css">
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- font awesome for giving pet icon -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <?php include "header.php"
    ?>

    <div class="message_who">
        <div class="color_container">
            <div class="kulay1">
                <div class="chats_with">Profile</div>
            </div>

            <div class="both_cont">
                <?php
                // If the get variable is available
                if (isset($_GET['user_id'])) {
                    // if it is the logged in user
                    if ($_SESSION['userID'] == $_GET['user_id']) {
                        $sql = "SELECT u.*, m.muni_name FROM users AS u
                                INNER JOIN municipality AS m ON m.muniID = u.muniID
                                WHERE u.userID = " . $_SESSION['userID'];

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $GLOBALS['fname'] = $row['fname'];
                                $GLOBALS['lname'] = $row['lname'];
                                $GLOBALS['muni_name'] = $row['muni_name'];
                                $GLOBALS['prof_pic'] = $row['prof_pic'];
                            }
                        } else {
                            // redirect to dashboard when there is no such userID
                            echo "<script>location.href='dashboard.php'</script>";
                            exit();
                        }

                        // if the user is not the logged in one
                    } else {
                        $sql = "SELECT u.*, m.muni_name FROM users AS u
                                INNER JOIN municipality AS m ON m.muniID = u.muniID
                                WHERE u.userID = " . $_GET['user_id'];

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $GLOBALS['fname'] = $row['fname'];
                                $GLOBALS['lname'] = $row['lname'];
                                $GLOBALS['muni_name'] = $row['muni_name'];
                                $GLOBALS['prof_pic'] = $row['prof_pic'];
                            }
                        } else {
                            // redirect to dashboard when there is no such userID
                            echo "<script>location.href='dashboard.php'</script>";
                            exit();
                        }
                    }
                }

                ?>
                <div class="prof_pic">
                    <img src="../images/prof_pics/<?php echo  $GLOBALS['prof_pic']; ?>" alt="">

                    <?php
                    if (isset($_GET['user_id'])) {
                        // if it is the logged in user
                        if ($_SESSION['userID'] == $_GET['user_id']) {
                    ?>
                            <h6> Change Profile Picture</h6>
                            <input class=" form-control upload" type="file" id="upload_pics" name="upload_pics" accept=".jpg, .png, .jpeg">
                            <input type="button" class="btn btn-primary send" value="Change">
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="details">
                    <div class="flname">Name: <span><?php echo  $GLOBALS['fname'] . " " . $GLOBALS['lname']; ?></span></div>

                    <div class='muni_name'>Municipality: <span><?php echo  $GLOBALS['muni_name']; ?></span></div>

                </div>
            </div>

        </div>
    </div>

    <!-- add color to link item of this page on the header -->
    <script>
        function navbarColor() {
            document.getElementById('profile').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
            document.getElementById('profile_atag').style.color = 'white';
        }
        navbarColor();
    </script>

    <!-- internal script for changing the profile picture -->
    <script>
        $(document).ready(function() {
            $('.send').click(function() {
                var fd = new FormData();
                var upload_pics = $('#upload_pics')[0].files[0];
                // console.log(upload_pics);
                fd.append('upload_pics', upload_pics);
                // console.log(fd);
                $.ajax({
                    url: 'profile_pic_upload.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // alert(response);
                    }
                })
            })
        })
    </script>

    <!-- footer -->
    <?php include "footer.php";
    ?>
</body>

</html>