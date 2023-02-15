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
    <title>Recieve Pets | Fur-Kanlungan</title>
    <link rel="icon" href="../images/logo.gif" type="image/gif">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for pet_receive.php -->
    <link rel="stylesheet" href="../css/pet_receive.css">
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <div class="chats_with">Receive Pets</div>
            </div>


            <?php
            $userID = $_SESSION['userID'];
            $sql = "SELECT p.*, u.* FROM pet AS p
    INNER JOIN users AS u ON u.userID = p.userID
             WHERE p.given_to = " . $_SESSION['userID'] . " ORDER BY name";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    // get 1 photo of each pet
                    $get1Photo = "SELECT photo FROM pet_photo WHERE petID = " . $row['petID'] . " ORDER BY petphoID DESC LIMIT 1";
                    $resPho = $conn->query($get1Photo);
                    if ($resPho->num_rows > 0) {

                        while ($rowPho = $resPho->fetch_assoc()) {
            ?>
                            <div class="each_userchat">
                                <!-- Pet Name -->
                                <a href="pet_info.php?pet_id=<?php echo $row['petID']; ?>"><img class="prof_pic" src="../images/pet_pics/<?php echo $rowPho['photo']; ?>" alt="" data-bs-toggle="tooltip" data-bs-placement="top" title="View Pet Info"></a>
                              
                                <a href="pet_info.php?pet_id=<?php echo $row['petID']; ?>" class="atag_name" data-bs-toggle="tooltip" data-bs-placement="top" title="View Pet Info">
                                    <div class="fullname"><?php echo $row['name'] ?>,</div>
                                </a>
                                <!-- owner -->
                                <a href="" class="atag_name" data-bs-toggle="tooltip" data-bs-placement="top" title="View Profile">
                                    <div class="fullname">from <?php echo $row['fname'] ?></div>
                                </a>
                                <div class="options" >
                                <!-- accept icon -->
                                <a href="pet_accept_reject.php?accept_pet=<?php echo $row['petID'];?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Accept this Pet">
                                <i class="fa fa-check"></i>
                                </a>
                                <!-- reject icon -->
                                <a href="pet_accept_reject.php?reject_pet=<?php echo $row['petID']; ?>"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Reject this Pet">
                                <i class="fa fa-close"></i>
                                </a>
                                </div>
                            </div>
            <?php
                        }
                    }
                }
            }
            ?>


        </div>
    </div>
    <!-- add color to link item of this page on the header -->
    <script>
        function navbarColor() {
            document.getElementById('pet_receive').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
            document.getElementById('pet_receive_atag').style.color = 'white';
        }
        navbarColor();
    </script>

    <!-- footer -->
    <?php include "footer.php";
    ?>
</body>

</html>

<?php $conn->close(); ?>