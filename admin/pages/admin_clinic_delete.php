<?php
include "../../pages/connect.php";
session_start();

if (!isset($_SESSION['adminID'])) {
    header("location: admin-login.php");
    exit();
}



// execute when this when submitted to delete
if (isset($_POST['btn_delete_clinic'])) {
    // try {
    // delete photos from clinic_photo
    $sql = "
          DELETE  FROM clinic_photo WHERE clinicID = ?
          ";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $_SESSION['clinicID']);
    $result->execute();

    // delete photos from clinic_photo
    $sql = "
          DELETE  FROM clinic WHERE clinicID = ?
          ";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $_SESSION['clinicID']);
    $result->execute();

    $conn->close();


?>
    <script>
        window.location.href = 'admin_clinic.php';
    </script>

<?php
    // unset session variable 
    unset($_SESSION["clinicID"]);
    exit();
    // } catch (Exception $result) {
    // }
}


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Clinic | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for admin_clinic.php.php -->
    <!-- <link rel="stylesheet" href="../css/admin_clinic.css"> -->
    <link rel="stylesheet" href="../css/admin_clinic_delete.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/admin_header.css">
    <!-- update icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- map -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/map.css" /> -->
    <!-- map js -->
    <!-- <script type="module" src="../js/map.js"></script> -->
</head>


<body>
    <?php include_once 'admin_header.php'; ?>
    <div class="clinic min-vh-100">
        <div class="list_clinic">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="create_clinic_form" method="post">
                <div class="form">
                    <div> <img src="../../images/backTo.png" id="backTo" onclick="history.back()"></div>
                    <div class="delete_cont">

                        <div id="title">
                            <h4 class="mb-4">Delete
                                <?php
                                // display the name of the clinic

                                $getID = $_GET['clinicID'];
                                $_SESSION['clinicID'] = $_GET['clinicID'];
                                $sql = "SELECT clinic_name FROM clinic WHERE clinicID= '$getID'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo $row['clinic_name']  . "?";
                                    }
                                } else {
                                    $conn->close();
                                    echo "<script>alert('Oops! Technical Error')</script>";
                                    // echo "<script>
                                    //                         window.location.href='admin_clinic.php';
                                    //                         </script>";
                                    // exit();
                                }
                                ?>
                                ?</h4>
                        </div>


                        <!-- delete and cancel button -->
                        <div class=" cancel_delete_button mb-2">

                            <input type="submit" class="btn btn-primary btn_delete_clinic me-4" name="btn_delete_clinic" id="btn_delete_clinic" value="Delete">

                            <input type="button" class="btn btn-primary btn_cancel_clinic" name="btn_cancel_clinic" id="btn_cancel_clinic" value="Cancel" onclick="history.back()">

                        </div>


                    </div>
            </form>
        </div>
        </form>
    </div>
    </div>

    <script>
        document.getElementById('clinic').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
    </script>


</body>

</html>

<?php $conn->close(); ?>

</html>