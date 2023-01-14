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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chats | Fur-Kanlungan</title>
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
    <?php //include "header.php"
    ?>
    <?php
    $_SESSION['last_messaged_userID'] = $_GET['pet_user'];
    $owner_id = $_SESSION['last_messaged_userID'];
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

    <div class="message_who" style="width: 100vw; height: 100vh">
        <div class="back">
            <img onclick="history.back()" style="height: 3em; width: 3em" src="../images/backTo.png">
        </div>
        <div class="display_validid">
            <?php
            $sql = "SELECT photo_id FROM users WHERE userID = $owner_id";
            $result = $conn->query($sql);
            $getPhoto = "";
            if ($result->num_rows > 0) {
                while ($getPhoto = $result->fetch_assoc()) {
                    // echo $getPhoto['photo_id'];

            ?>
                    <img src="../images/valid_id/<?php echo $getPhoto['photo_id']; ?>" alt="" id="photo_id">
            <?php
                }
            }

            ?>

        </div>

        <div class="name_of_message">Talk with <span id="changeColor" style="font-weight:bolder; text-transform:capitalize;" onmouseover="changeColor()" onmouseleave="defaultColor()"><?php echo "$owner_fname $owner_lname !"; ?></span> </div>
        <div class="chat_box">
            <!-- <input type="text" class="chat_field"> -->
            <textarea name="chat_field" class="chat_field" cols="30" rows="10"></textarea>
            <input type=" button" class="btn btn-primary" value="send">
        </div>


    </div>
    <?php //include "footer.php"
    ?>

    <script>
        function changeColor() {
            document.getElementById("changeColor").style.color = "red";
            document.getElementById("photo_id").style.display = "block";
        }

        function defaultColor() {
            document.getElementById("changeColor").style.color = "black";
            // document.getElementById("photo_id").style.display = "none";
        }
    </script>
</body>

</html>


<?php $conn->close(); ?>