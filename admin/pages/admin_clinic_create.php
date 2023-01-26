<?php
include "../../pages/connect.php";
session_start();

if (!isset($_SESSION['adminID'])) {
    header("location: admin-login.php");
    exit();
}

?>

<!-- create the clinic -->
<?php

if (isset($_POST['btn_create_clinic'])) {
    // get the post variables
    $name = trim(htmlspecialchars(strtolower($_POST['name'])));
    $email = trim(htmlspecialchars(strtolower($_POST['email'])));
    $owner = trim(htmlspecialchars(strtolower($_POST['owner'])));
    $municipality = trim(htmlspecialchars(strtolower($_POST['municipality'])));
    $contact = trim(htmlspecialchars(strtolower($_POST['contact'])));
    $open_hours = trim(htmlspecialchars(strtolower($_POST['open_hours'])));
    $services = trim(htmlspecialchars(strtolower($_POST['services'])));
    $description = trim(htmlspecialchars(strtolower($_POST['description'])));

    // holds the munID
    $muniID = "";

    // get the municipality id based from the muni_name input
    $sql = "SELECT muniID FROM municipality WHERE muni_name = '$municipality'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $muniID = $row['muniID'];
    }




    // check file size
    if ($_FILES['upload_pics']['size'] > 5000000) {


        try {

            $sql = "INSERT INTO clinic(clinic_name, email, owner, muniID, contact_no,
            open_hours, services, description) VALUES(?, ?, ?, ? ,? ,? , ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param(
                "sssissss",
                $name,
                $email,
                $owner,
                $muniID,
                $contact,
                $open_hours,
                $services,
                $description
            );
            $stmt->execute();
        } catch (Exception $stmt) {
            echo "Ang error ay: " . $conn->error;
        } finally {

            // File upload configuration 
            $targetDir = "C:/xampp/htdocs/fur-kanlungan/images/clinic_pics/";
            $allowTypes = array('jpg', 'png', 'jpeg');
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
            $upload_pics = array_filter($_FILES['upload_pics']['name']);

            // get each file name in $_FILES
            foreach ($_FILES['upload_pics']['name'] as $key => $val) {
                // File upload path 
                $fileName = basename($_FILES['upload_pics']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;

                // Check whether file type is valid 
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server 
                    if (move_uploaded_file($_FILES["upload_pics"]["tmp_name"][$key], $targetFilePath)) {

                        // clinicID variable
                        $clinicID = "";

                        // get the clinic id of this newly created clinic
                        $getclinicID = "SELECT clinicID FROM clinic WHERE clinic_name = '$name' ";
                        $result = $conn->query($getclinicID);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $clinicID = $row['clinicID'];
                            }
                        } else {
                            echo $conn->error;
                        }

                        // upload clinic photos to clinic_photo
                        $stmt = $conn->prepare("INSERT INTO clinic_photo(photo, clinicID) VALUES ( ?, ?)");
                        $stmt->bind_param("si", $fileName, $clinicID);
                        $stmt->execute();
                    } else {
                        $errorUpload .= $_FILES['upload_pics']['name'][$key] . ' | ';
                        echo $errorUpload;
                    }
                } else {
                    $errorUploadType .= $_FILES['upload_pics']['name'][$key] . ' | ';
                    echo $errorUploadType;
                }
            }
            $conn->close();

            echo "<script>
            window.location.href='admin_clinic.php';
            </script>";
            exit();
        }
    } else {
        echo '<script>alert("File size limit: 5MB")</script>';
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create clinic | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for admin_clinic.php.php -->
    <!-- <link rel="stylesheet" href="../css/admin_clinic.css"> -->
    <link rel="stylesheet" href="../css/admin_clinic_create.css">
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="create_clinic_form" method="post" enctype="multipart/form-data">
                <div class="form">
                    <div class="clinic_short_details">
                        <div> <img src="../../images/backTo.png" id="backTo" onclick="window.location.href = 'admin_clinic.php'"></div>
                        <div id="title">
                            <h4 class="mb-4">Create clinic</h4>
                        </div>

                        <!-- clinic name -->
                        <div class="name_cont">
                            <label for="name" class="form-label  mt-2">Name</label>
                            <input type="text" class="form-control" id="name" placeholder=" Name" name="name" required>
                            <div> <small id="name_err" style="color: red;"></small></div>
                        </div>

                        <!-- email -->
                        <div class="email_cont">
                            <label for="email" class="form-label  mt-2">Email</label>
                            <input type="text" class="form-control" id="email" placeholder=" email" name="email" required>
                            <div> <small id="email_err" style="color: red;"></small></div>
                        </div>

                        <!-- owner -->
                        <div class="owner_cont">
                            <label for="owner" class="form-label  mt-2">Owner</label>
                            <input type="text" class="form-control" id="owner" placeholder=" owner" name="owner" required>
                            <div> <small id="owner_err" style="color: red;"></small></div>
                        </div>

                        <!-- municipality -->
                        <label for="municipality" class="form-label">Municipality</label>
                        <select class="form-select btn municipality" aria-label="Default select example" id="municipality" name="municipality" required>
                            <option value="none">Select municipality</option>
                            <?php
                            // select all municipality
                            $sql = "SELECT muni_name FROM municipality;";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $get_muni_name = $row["muni_name"];
                                    echo "<option value='$get_muni_name' id='get_muni_name'>$get_muni_name</option>";
                                }
                            } else {
                                // echo "0 results";
                            }

                            ?>
                        </select>


                        <!-- Upload pics of the clinic -->
                        <label for="upload_pics" class="form-label mt-2">Upload Photos</label>
                        <input class=" form-control" type="file" id="upload_pics" name="upload_pics[]" multiple accept=".jpg, .png, .jpeg" required>
                        <div class="mb-2"> <small id="upload_pics_err" style="color: red;"></small></div>

                        <!-- contact -->
                        <div class="contact_cont">
                            <label for="contact" class="form-label  mt-2">Contact</label>
                            <input type="text" class="form-control" id="contact" placeholder=" contact" name="contact" required>
                            <div> <small id="contact_err" style="color: red;"></small></div>
                        </div>

                        <!-- open_hours -->
                        <div class="open_hours_cont">
                            <label for="open_hours" class="form-label  mt-2">Open Hours</label>
                            <input type="text" class="form-control" id="open_hours" placeholder=" open_hours" name="open_hours" required>
                            <div> <small id="open_hours_err" style="color: red;"></small></div>
                        </div>



                    </div>
                    <!-- services -->
                    <div class="services">
                        <label for="services" class="form-label">Services</label>
                        <textarea name="services" id="services" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="description">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" required></textarea>
                    </div>
                </div>

                <!-- Create button -->
                <div class="create_button  mt-4">
                    <input type="submit" class="btn btn-primary btn_create_clinic" name="btn_create_clinic" id="btn_create_clinic" value="Create">
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('clinic').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
    </script>

    <!-- map script  -->
    <!-- <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script> -->
</body>

</html>

<?php $conn->close(); ?>