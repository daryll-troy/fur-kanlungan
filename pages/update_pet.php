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

<!-- update pet script -->
<?php
// if the button type is now submit after validation
if (isset($_POST['btn_update_pet'])) {
    //get the description value from the text area input field
    $description = trim(htmlspecialchars($_POST['description']));
    // get petID from the database
    $getID = "";

    // File upload configuration 
    $targetDir = "C:/xampp/htdocs/fur-kanlungan/images/pet_pics/";
    $allowTypes = array('jpg', 'png', 'jpeg');
    $statusMsg = $errorMsg = $errorUpload = $errorUploadType = '';
    $upload_pics = array_filter($_FILES['upload_pics']['name']);

    // check file size
    if ($_FILES['upload_pics']['size'] > 5000000) {
        try {
            // validate the id of the $_GET['petID']
           if (isset($_SESSION['petID'])) {
                $getID = $_SESSION['petID'];
                $sql = "SELECT petID FROM pet WHERE petID = '$getID'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $getID = $row['petID'];
                    }
                } else {
                    $conn->close();
                    echo "<script>alert('Invalid Pet ID! 2')</script>";
                    echo "<script>
                     window.location.href='my_pets.php';
                       </script>";
                    exit();
                }

                // UPDATE THE DESCRIPTION
                $change_desc = " UPDATE pet SET description = ? WHERE petID = ?";

                $stmt = $conn->prepare($change_desc);
                $stmt->bind_param("si", $description, $getID);
                $stmt->execute();
            }
        } catch (Exception $stmt) {
            $conn->close();
            echo "<script>alert('An database error occured! :(')</script>";
            echo "<script>
            window.location.href='my_pets.php';
            </script>";
            exit();
        } finally {

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



                        // upload pet photos to pet_photo
                        $stmt = $conn->prepare("INSERT INTO pet_photo(photo, petID) VALUES ( ?, ?)");
                        $stmt->bind_param("si", $fileName, $getID);
                        try {
                            $stmt->execute();
                            
                            

                            
                        } catch (Exception $stmt) {
                            $conn->close();
                            echo "<script>alert('An database error occured! :(')</script>";
                            header('location: my_pets.php');
                            exit();
                        }
                    } else {
                        $errorUpload .= $_FILES['upload_pics']['name'][$key] . ' | ';
                    }
                } else {
                    $errorUploadType .= $_FILES['upload_pics']['name'][$key] . ' | ';
                }
            }
            // let the iteration of file names finish first before exiting the script
            $conn->close();
            unset($_SESSION['petID']);
            // echo "<script>alert('Pet Updated!')</script>";
            echo "<script>
            window.location.href='my_pets.php';
            </script>";
            exit();
        }
    } else {
        echo '<script>alert("File size limit: 5MB")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pet | Fur-Kanlungan </title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for create_pets.php.php -->
    <link rel="stylesheet" href="../css/update_pet.css">

    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- header -->
    <?php include "header.php";
    ?>

    <div class="update_pets min-vh-100">
        <div id="layer">
            <div class="form_div">
                <div class="update_pet_title">
                    <div id="back_div"><a href="my_pets.php"> <img src="../images/backTo.png" id="backTo"></a></div>
                    <div id="title_div">
                        <h4 class="mb-4" style="text-transform:capitalize;">Update <?php
                                                                                    $getID = "";
                                                                                    // display the name of the pet
                                                                                    try {

                                                                                        $getID = $_GET['pet_id'];
                                                                                        $sql = "SELECT petID, name FROM pet WHERE petID = '$getID'";
                                                                                        $result = $conn->query($sql);
                                                                                        if ($result->num_rows > 0) {
                                                                                            while ($row = $result->fetch_assoc()) {
                                                                                                echo $row['name'];
                                                                                                $_SESSION['petID'] = $row['petID'];
                                                                                            }
                                                                                        } else {
                                                                                            $conn->close();
                                                                                            // echo "<script>alert('Invalid Pet ID! 1')</script>";
                                                                                            echo "<script>
                                                                                                window.location.href='my_pets.php';
                                                                                                </script>";
                                                                                            exit();
                                                                                        }
                                                                                    } catch (Exception $getID) {
                                                                                    }


                                                                                    ?>
                        </h4>
                    </div>
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="update_pet_form" method="post" enctype="multipart/form-data">
                    <!-- Upload pics of the pet -->
                    <label for="upload_pics" class="form-label mt-2">Add Photos</label>
                    <input class=" form-control" type="file" id="upload_pics" name="upload_pics[]" multiple accept=".jpg, .png, .jpeg">
                    <div class="mb-2"> <small id="upload_pics_err" style="color: red;"></small></div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="1" placeholder="Text here..." style=" text-indent: 0;">
                        <?php
                        $getID = $_GET['pet_id'];
                        $sql = "SELECT petID FROM pet WHERE petID = '$getID'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                               
                                $_SESSION['petID'] = $row['petID'];
                            }
                        }

                        // get the saved description
                        $getID = $_GET['pet_id'];
                        $sql = "SELECT description from pet WHERE petID = '$getID'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                echo trim($row['description']);
                            }
                        }
                        ?>
                        </textarea>
                        <div class="mb-2"> <small id="description_err" style="color: red;"></small></div>
                    </div>

                    <!-- update button -->
                    <div class="update_button mb-2">
                        <input type="button" class="btn btn-primary btn_update_pet" name="btn_update_pet" id="btn_update_pet" value="Update">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="../js/update_pet.js"></script>
</body>

</html>