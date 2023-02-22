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
    <title>About Us | Fur-Kanlungan</title>
    <link rel="icon" href="../images/logo.gif" type="image/gif">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for about_us.php -->
    <link rel="stylesheet" href="../css/about_us.css">
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
                <div class="chats_with">About Us</div>
            </div>

            <div class="both_cont">
                <!-- given pet -->
                <div class="pet_given">
                    <div class="given_title">
                        Group Members
                    </div>
                    <!-- kenneth -->
                    <div class='card' style='width: 18rem; '>
                        <div class='d-flex justify-content-center ipa-grey'>
                            <img src='../images/kenneth.jpg' class='card-img-top img-fluid' alt='image'>
                        </div>
                        <div class='card-body'>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span> Kenneth Del Rosario </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Contact: </span> 09477482394 </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Residence: </span> San Miguel, Calasiao </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold;'>Email: </span> kennethdelrosario889@gmai.com </p>
                        </div>
                    </div>
                    <!-- daryll -->
                    <div class='card' style='width: 18rem; '>
                        <div class='d-flex justify-content-center ipa-grey'>
                            <img src='../images/daryll.jpg' class='card-img-top img-fluid' alt='image'>
                        </div>
                        <div class='card-body'>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span> Daryll Troy Calmona </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Contact: </span> 09301696212 </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Residence: </span> Caranglaan, Dagupan City </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold;'>Email: </span> troydaryll@gmail.com </p>
                        </div>
                    </div>
                    <!-- John -->
                    <div class='card' style='width: 18rem; '>
                        <div class='d-flex justify-content-center ipa-grey'>
                            <img src='../images/john.jpg' class='card-img-top img-fluid' alt='image'>
                        </div>
                        <div class='card-body'>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span> John Reyes Millenio </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Contact: </span> 09694512346 </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Residence: </span> Lasip Grande, Dagupan City </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold;'>Email: </span> reyesjm.442.stud@cdd.edu.ph </p>
                        </div>
                    </div>

                    <!-- Erika -->
                    <div class='card' style='width: 18rem; '>
                        <div class='d-flex justify-content-center ipa-grey'>
                            <img src='../images/erika.png' class='card-img-top img-fluid' alt='image'>
                        </div>
                        <div class='card-body'>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span> Erika Elaine Sison</p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Contact: </span> 09799522346 </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Residence: </span> Lingayen, Pangasinan </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold;'>Email: </span> sisonel.344.stud@cdd.edu.ph </p>
                        </div>
                    </div>

                    <!-- Joan -->
                    <div class='card' style='width: 18rem; '>
                        <div class='d-flex justify-content-center ipa-grey'>
                            <img src='../images/joan.jpg' class='card-img-top img-fluid' alt='image'>
                        </div>
                        <div class='card-body'>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span> Joan Quinto </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Contact: </span> 09524623152 </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Residence: </span> Lingayen, Pangasinan </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold;'>Email: </span> quintoj.866.stud@cdd.edu.ph </p>
                        </div>
                    </div>

                    <!-- Trishia -->
                    <div class='card' style='width: 18rem; '>
                        <div class='d-flex justify-content-center ipa-grey'>
                            <img src='../images/trishia.jpg' class='card-img-top img-fluid' alt='image'>
                        </div>
                        <div class='card-body'>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span> Trishia Mae Quinones </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Contact: </span> 091245162447 </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Residence: </span> Tapuac, Dagupan City </p>
                            <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold;'>Email: </span> quinones.341.stud@cdd.edu.ph </p>
                        </div>
                    </div>
                </div>


                <!-- recieved pet -->
                <div class="pet_received">
                    <div class="received_title">
                        Description
                    </div>
                    <div class="received_content">
                        <p id="description">
                            We are 4th year College Students taking up Bachelor of Science in Information and Technology.
                            This Capstone Project serves as the highlight of our entire course. This website aims to help
                            pet lovers to seek potential adopters of their respective pets to minimize the number of stray animals
                            roaming in public.
                        </p>
                                
                       
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- add color to link item of this page on the header -->
    <script>
        function navbarColor() {
            document.getElementById('history').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
            document.getElementById('history_atag').style.color = 'white';
        }
        navbarColor();
    </script>

    <!-- footer -->
    <?php include "footer.php";
    ?>
</body>

</html>