<?php
// connect to database
include 'connect.php';
// start a session
session_start();
// // check if the user had already logged in
if (!isset($_SESSION['userID'])) {
    $conn->close();
    header("location: ../index.php");
    exit();
}
?>

<?php
$pet_id = "";
$photo_array = array();
// $clinic_photo = "";
// get the petID of the clicked pet from my_pets.php
if (isset($_GET['clinic_id'])) {
    $pet_id = $_GET['clinic_id'];
    $_SESSION['clinic_id'] = $_GET['clinic_id'];

    // get the all photos of the pet
    $sql = "
    SELECT s.*, m.muni_name, sp.photo FROM municipality AS m
                    INNER JOIN clinic AS s ON s.muniID = m.muniID
                    INNER JOIN clinic_photo AS sp ON sp.clinicID = s.clinicID
                    WHERE s.clinicID = $pet_id
              ORDER BY s.clinic_name
                        ";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {
            $GLOBALS['clinic_photo'] =  $row["photo"];
            $GLOBALS['clinic_name'] = $row['clinic_name'];
            $GLOBALS['email'] = $row['email'];
            $GLOBALS['owner'] = $row['owner'];
            $GLOBALS['muni_name'] = $row['muni_name'];
            $GLOBALS['contact_no'] = $row['contact_no'];
            $GLOBALS['open_hours'] = $row['open_hours'];
            $GLOBALS['services'] = $row['services'];
            $GLOBALS['description'] = $row['description'];
        }
    } else {
        echo "<script>alert('No such clinic ID!!')</script>";
        echo "<script>window.location.href = 'clinic_list.php'</script>";
        exit();
    }
}

// this will be used for the first pic displayed upon loading of product_info
$_SESSION['coverPetPic'] = $GLOBALS['clinic_photo'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clinic | Fur-Kanlungan</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- link to clinic_info.css -->
    <link rel="stylesheet" href="../css/clinic_info.css">
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <div class='pet_info min-vh-100'>
        <!-- div for pet details -->
        <div class='pet_pics'>
            <div class='previous_pic'>
                <img src='../images/backward.png' onclick="backward()">
            </div>
            <img src='' id="pet_pic">

            <div class='next_pic'>
                <img src='../images/forward.png' onclick="forward()">
            </div>
        </div>

        <!-- div for pet details-->
        <div class="pet_details">
            <div class="details_container">

                <div class="back_img">
                    <img src="../images/backTo.png" alt="" id="backTo" onclick="history.back()">
                    <div class="name prodName">clinic <span><?php echo $GLOBALS['clinic_name'] ?></span></div>
                </div>
                <div id="not_desc">
                    <div class="name">Municipality: <span><?php echo  $GLOBALS['muni_name'] ?></span></div>
                    <div class="name">Email: <span><?php echo $GLOBALS['email'] ?></span></div>
                    <div class="name">Open: <span><?php echo  $GLOBALS['open_hours']  ?></span></div>
                    <div class="name">Phone: <span><?php echo  $GLOBALS['contact_no']  ?></span></div>
                    <div class="name">Owner: <span><?php echo $GLOBALS['owner'] ?></span></div>
                </div>
                <div id="desc">
                    <div class="name">
                    Services: <br>
                        <div class="mb-4"> <?php echo $GLOBALS['services']  ?></div>
                    Description: <br>
                        <div> <?php echo $GLOBALS['description']  ?></div>
                     </div>
                </div>

            </div>

        </div>


    </div>




    <?php include_once 'footer.php'; ?>
    <script src="../js/clinic_info_pic.js"></script>

    <?php $conn->close(); ?>

</body>


</html>