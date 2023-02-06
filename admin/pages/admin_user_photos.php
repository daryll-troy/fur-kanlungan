<?php
include "../../pages/connect.php";
session_start();

if (!isset($_SESSION['adminID'])) {
    header("location: admin-login.php");
    exit();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Photos| Fur-Kanlungan </title>
    <link rel="icon" href="../../images/logo.gif" type="image/gif">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../../css/css-resets.css">
    <!-- css for admin_clinic.php.php -->
    <link rel="stylesheet" href="../css/admin_user_photos.css">

    <!-- update icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <div class='clinic_info min-vh-100'>
        <!-- ALL clinic PHOTOS -->
        <div class='clinic_pics'>
            <!-- Get all the photos of this clinicID -->
            <?php
            $getuserID = $_GET['userID'];
            // query all photos of this userID
            $sql = "SELECT prof_pic, photo_id FROM users WHERE userID = $getuserID ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>

                    <div class="each_photo">
                        <img src="../../images/valid_id/<?php echo $row['photo_id'] ?>" alt="" class="each_img">
                        <div class="photo_id_title" style="color: aliceblue;">
                            Valid ID
                        </div>
                    </div>

                    <div class="each_photo">
                        <img src="../../images/prof_pics/<?php echo $row['prof_pic'] ?>" alt="" class="each_img">
                        <div class="prof_pic_title" style="color: aliceblue;">
                            Profile Picture
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <script>
                    alert("Nothing to show");
                </script>
            <?php
            }
            ?>


        </div>
        <!-- SERVICES AND DESCRIPTION OF THE clinic -->
        <div class="serv_desc">

            <div class="pinakaTitle">
                User
                <?php
                // get clinic name again
                $userID = $_GET['userID'];
                $sql = "SELECT username, fname, lname FROM users WHERE userID = $userID";
                $result = $conn->query($sql);
                if ($result->num_rows >  0) {
                    while ($row = $result->fetch_assoc()) {
                        echo $row['username'];
                    }
                }
                ?>

            </div>

            <div class="back_img">
                <div class="back_img_inner">
                    <img src="../../images/backTo.png" alt="" id="backTo" onclick="window.location.href = 'admin_user.php'">
                </div>

                <!-- check if the user is not validated yet -->
                <?php
                // But first, check if $_GET['userID'] is set
                if (isset($_GET['userID'])) {
                    $sql = "SELECT verified_id FROM users WHERE userID = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $_GET['userID']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $GLOBALS['verified_id'] = $row['verified_id'];
                    } else {
                ?>
                        <script>
                            alert('Verified ID column not found');
                        </script>
                    <?php
                    }
                }

                // check if the verified_id column is  `no`
                if ($GLOBALS['verified_id'] == "no") {
                    ?>
                    <div class="btn_validate">
                        <input type="button" value="Verify" class="btn btn-primary verify" style="background-color:forestgreen; border:none; min-width:5em;">
                    </div>
                <?php
                } else {
                ?>
                    <div class="btn_validate">
                        <input type="button" value="Verified" class="btn btn-primary verified" style="background-color:silver; border:none; min-width:5em;">
                    </div>
                <?php
                }
                ?>

                <!-- the only purpose of this div is to center the validate button since the justify-self in flexbox does not work -->
                <div class="filler">

                </div>
            </div>

        </div>


        <!-- JS FOR THE VERIFICATION OF THE USER-->
        <script>
            $(document).ready(function() {
                $('.verify').click(() => {

                    const userID = <?php echo $_GET['userID']; ?>;
                    // verify confirmation
                    if (confirm("Verify User?")) {
                        $.ajax({
                            url: "verify_user.php",
                            method: "post",
                            data: {
                                userID: userID
                            },
                            success: () => {
                               location.reload()
                            }
                        })

                    }

                })
            })
        </script>
</body>

</html>

<?php
$conn->close();
?>