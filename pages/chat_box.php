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
}else {
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
    <!-- css for chat_box.php -->
    <link rel="stylesheet" href="../css/chat_box.css">
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    // echo $_GET['pet_user'];
    ?>
    <?php include "header.php"
    ?>
    <?php
    // pass the get variable to a session variable for error fixes
    if (isset($_GET['pet_user']))
        $_SESSION['last_contacted'] = $_GET['pet_user'];

    $owner_id = $_SESSION['last_contacted'];
    $owner_fname = $owner_lname = "";
    $sql = "SELECT fname, lname from users WHERE userID = $owner_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($get_name = $result->fetch_assoc()) {
            $owner_fname = $get_name['fname'];
            $owner_lname = $get_name['lname'];
        }
    }
    ?>

    <div class="message_who">
        <div class="color_container">
            <div class="chatbox_header">
                <div class="back">
                    <img onclick="history.back()" style="height: 3em; width: 3em" src="../images/backTo.png">
                </div>
                <div class="pic_name">
                    <div class="name_of_message"><span class="ms-2" id="changeColor" style="font-weight:bolder; text-transform:capitalize;"><?php echo  "$owner_fname $owner_lname"; ?></span> </div>
                    <div class="display_validid">
                        <?php
                        $sql = "SELECT prof_pic FROM users WHERE userID = $owner_id";
                        $result = $conn->query($sql);
                        $getPhoto = "";
                        if ($result->num_rows > 0) {
                            while ($getPhoto = $result->fetch_assoc()) {
                        ?>
                                <img src="../images/prof_pics/<?php echo $getPhoto['prof_pic']; ?>" alt="" id="photo_id">
                        <?php
                            }
                        }

                        ?>

                    </div>
                </div>
            </div>
            <div class="messages_display" id="messages_display">
                <?php
                // check if the get variable of the contacted user still exists
                if (isset($_GET['pet_user'])) {
                    $userID = $_SESSION['userID'];
                    $contacting = $_GET['pet_user'];
                    $sql = "SELECT * FROM chat_log WHERE (sender =$userID AND reciever = $contacting) OR (sender =$contacting AND reciever = $userID)";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        // check that message is not null and photo is null
                        if ($row['message'] !== null && $row['photo'] === null) {
                            // if sender is the userID, then display the message to the right of the screen
                            if ($row['sender'] === $userID) {
                ?>
                                <div class="right_container">
                                    <div class="display_message_right me-2 mb-3"><?php echo $row['message']; ?></div>
                                </div>
                            <?php
                                // if sender is the last_contacted, then display the message to the left of the screen
                            } else {
                            ?>
                                <div class="left_container">
                                    <div class="display_message_left ms-2 mb-3"><?php echo $row['message']; ?></div>
                                </div>
                            <?php
                            }
                        }
                    }
                    // if get variable $_GET['pet_user'] is not available, use the session variable $_SESSION['last_contacted']
                } else {
                    $userID = $_SESSION['userID'];
                    $contacting = $_SESSION['last_contacted'];
                    $sql = "SELECT * FROM chat_log WHERE (sender =$userID AND reciever = $contacting) OR (sender =$contacting AND reciever = $userID)";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        // check that message is not null and photo is null
                        if ($row['message'] !== null && $row['photo'] === null) {
                            // if sender is the userID, then display the message to the left of the screen
                            if ($row['sender'] === $userID) {
                            ?>
                                <div class="right_container">
                                    <div class="display_message_right me-2 mb-3"><?php echo $row['message']; ?></div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="display_message_left ms-2 mb-3"><?php echo $row['message']; ?></div>
                <?php
                            }
                        }
                    }
                }
                ?>
            </div>
            <div class="chat_box">
                <!-- <input type="text" class="chat_field"> -->
                <textarea name="chat_field" class="chat_field" cols="30" rows="10"></textarea>
                <!-- <input class="form-control-sm upload" type="file" name="upload"> -->
                <input type="button" class="btn btn-primary send" value="send">
            </div>


        </div>
    </div>

    <!-- footer -->
    <?php include "footer.php";
    ?>


    <!-- add color to link item of this page on the header -->
    <script>
        function navbarColor() {
            document.getElementById('chats').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
        }
        navbarColor();
    </script>

    <!-- JAVASCRIPT FOR AJAX -->
    <script src="../js/chat_box.js"></script>
</body>

</html>


<?php $conn->close(); ?>