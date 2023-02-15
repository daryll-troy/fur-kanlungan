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
    <title>History | Fur-Kanlungan</title>
    <link rel="icon" href="../images/logo.gif" type="image/gif">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for history.php -->
    <link rel="stylesheet" href="../css/history.css">
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
                <div class="chats_with">History</div>
            </div>

            <div class="both_cont">
                <!-- given pet -->
                <div class="pet_given">
                    <div class="given_title">
                        Given
                    </div>
                    <div class="given_content">
                        <?php
                        $userID = $_SESSION['userID'];
                        $sql = "SELECT d.*, u.fname, u.lname FROM deledopted AS d 
                            INNER JOIN users AS u ON u.userID = d.given_to
                        WHERE d.userID = " . $userID . " AND status = 'given'";

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <div class="each_userchat each_given">
                                    <!-- pet name -->
                                    <div class="fullname">Pet `<?php echo $row['name'] ?>` To User `<?php echo $row['fname'] . ' ' . $row['lname'] ?>` On <?php echo $row['date_time'] ?></div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- recieved pet -->
                <div class="pet_received">
                    <div class="received_title">
                        Received
                    </div>
                    <div class="received_content">
                        <?php
                        $userID = $_SESSION['userID'];
                        $sql = "SELECT d.*, u.fname, u.lname FROM deledopted AS d 
                            INNER JOIN users AS u ON u.userID = d.userID
                        WHERE d.given_to = " . $userID . " AND status = 'given'";

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <div class="each_userchat each_received">
                                    <!-- pet name -->
                                    <div class="fullname">Pet `<?php echo $row['name'] ?>` From User `<?php echo $row['fname'] . ' ' . $row['lname'] ?>` On <?php echo $row['date_time'] ?></div>
                                </div>
                        <?php
                            }
                        }
                        ?>
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