<?php
// connect to database
include 'connect.php';
// start a session
session_start();
// check if the user had already logged in
if (!isset($_SESSION['userID'])) {
    // $conn->close();
    // header("location: ../index.php");
    // exit();
} else {
    // check if verified_id != yes, then do not allow to access the chat feature
    // $sql = "SELECT verified_id FROM users WHERE userID =" .  $_SESSION['userID'];
    // $result = $conn->query($sql);
    // $verify = $result->fetch_assoc();
    // if ($verify['verified_id'] != "yes") {
    //     echo "<script>alert('Your account is being verified')</script>";
    //     echo "<script>window.location.href = 'dashboard.php'</script>";
    //     exit();
    // }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions | Fur-Kanlungan</title>
    <link rel="icon" href="../images/logo.gif" type="image/gif">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for terms_and_conditions.php -->
    <link rel="stylesheet" href="../css/terms_and_conditions.css">
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
    <?php //include "header.php"
    ?>

    <div class="message_who">
        <div class="color_container">
            <div class="kulay1">
                <div class="chats_with">Terms and Conditions</div>
            </div>

            <div class="both_cont">
               

                <!-- recieved pet -->
                <div class="pet_received">
                    <div class="received_title">
                        Cyber Crime/Bullying
                    </div>
                    <div class="received_content">
                        <p id="description">
                            Please be advised that the statements you make in this website through the chat system can be used as evidence against any verbal violence.
                            The Cybercrime Prevention Act of 2012, officially recorded as Republic Act No. 10175, is a law in the Philippines that was approved on September 12, 2012. It aims to address legal issues concerning online interactions and the Internet in the Philippines. Please be aware that you can be penalized from ₱200,000 up to ₱1,000,000 or be imprisoned for 6 to 12 years.
                        </p>
                                
                       
                    </div>

                    <div class="received_title">
                        Adoption
                    </div>
                    <div class="received_content">
                        <p id="description">
                           Any actions performed by users outside of this platform is beyond the accountability of the administrators. The trustworthiness of an adopter will solely be based on the owner's logical analysis of the former's character.
                        </p>
                                
                       
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- add color to link item of this page on the header -->
    <script>
        // function navbarColor() {
        //     document.getElementById('history').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
        //     document.getElementById('history_atag').style.color = 'white';
        // }
        // navbarColor();
    </script>

    <!-- footer -->
    <?php include "footer.php";
    ?>
</body>

</html>