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
    <title>Chats | Fur-Kanlungan</title>
    <link rel="icon" href="../images/logo.gif" type="image/gif">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for my_pets.php.php
    <link rel="stylesheet" href="../css/my_pets.css"> -->
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- css for chat_list.php -->
    <link rel="stylesheet" href="../css/chat_list.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</head>

<body>
    <?php include "header.php" ?>

    <div class="chat_list">
        <div class="color_container">
            <div class="kulay1">
                <div class="chats_with">Chat Conversations</div>

                <div class="d-flex flex-wrap justify-content-center pet-list">
                    <input class="form-control  type-search " type="search" placeholder="Search" aria-label="Search" id="type-search">
                </div>
            </div>

            <?php
            // get the chat convos if the user is in chat_log
            $userID = $_SESSION['userID'];
            $sql = "SELECT userID, fname, lname, prof_pic FROM users WHERE userID = ANY(
                SELECT sender FROM chat_log WHERE sender = $userID OR reciever = $userID
                UNION
                    SELECT reciever FROM chat_log WHERE sender = $userID OR reciever = $userID
                )";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // check if the user is not the logged in user
                    if ($row['userID'] != $userID) {
            ?>
                        <div class="each_userchat">
                            <a href="chat_box.php?pet_user=<?php echo $row['userID']; ?>"><img class="prof_pic" src="../images/prof_pics/<?php echo $row['prof_pic']; ?>" alt=""></a>
                            <a href="chat_box.php?pet_user=<?php echo $row['userID']; ?>" class="atag_name">
                                <div class="fullname"><?php echo $row['fname'] . " " . $row['lname']; ?></div>
                            </a>
                            <?php
                            // get the last convo sent between the two users
                            $getLastConvo = "SELECT * FROM chat_log WHERE (sender = ? AND reciever = ?) OR (sender = ? AND reciever = ?)  ORDER BY cLID DESC LIMIT 1";
                            $stmt = $conn->prepare($getLastConvo);
                            $stmt->bind_param("iiii", $row['userID'], $_SESSION['userID'], $_SESSION['userID'], $row['userID']);
                            $stmt->execute();
                            $resLastConvo = $stmt->get_result();
                            $rowLC = $resLastConvo->fetch_assoc();
                            ?>
                            <!-- I have temporarily removed the last message display due to difficulty of figuring out how to display them, respectively with each user, on the live search  -->
                            <!-- <div class="lastConvo"><?php //echo $rowLC['message']; ?></div> -->
                        </div>
            <?php

                    }
                }
            }
            ?>



        </div>
    </div>
    <?php include "footer.php" ?>

    <!-- add color to link item of this page on the header -->
    <script>
        function navbarColor() {
            document.getElementById('chats').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
        }
        navbarColor();
    </script>

    <!-- JAVASCRIPT FOR AJAX -->
    <script src="../js/chat_list.js"></script>
</body>

</html>


<?php $conn->close(); ?>