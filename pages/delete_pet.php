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


// execute when this when submitted to delete
if (isset($_POST['btn_delete_pet'])) {
    $_POST['petID'] = $_SESSION['petID'];
    try {
        // copy pet_photo to deledopted_photo
        $sql = "
 INSERT INTO deledopted_photo SELECT * FROM pet_photo WHERE petID = ? 
 ";
        $result = $conn->prepare($sql);
        $result->bind_param("i", $_POST['petID']);
        $result->execute();



        // delete photos from pet_photo
        $sql = "
        DELETE  FROM pet_photo WHERE petID = ?
        ";
        $result = $conn->prepare($sql);
        $result->bind_param("i", $_POST['petID']);
        $result->execute();

        // copy pet to deledopted
        $sql = "
    INSERT INTO deledopted SELECT * FROM pet WHERE petID = ? 
    ";
        $result = $conn->prepare($sql);
        $result->bind_param("i", $_POST['petID']);
        $result->execute();

        // delete pet from pet
        $sql = "
    DELETE  FROM pet WHERE petID = ?
    ";
        $result = $conn->prepare($sql);
        $result->bind_param("i", $_POST['petID']);
        $result->execute();


        $conn->close();
        // unset session variable 
        unset($_SESSION["petID"]);

        // echo "<script>alert('Pet Deleted!')</script>";

        // head back to my_pets.php
        echo "<script>
                window.location.href='my_pets.php';
                </script>";
        exit();
    } catch (Exception $result) {
        // echo "
        //     <script>alert(" . $conn->error . ");</script> ";
        echo "alert('conn->error')";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Pet | Fur-Kanlungan </title>
    <link rel="icon" href="../images/logo.gif" type="image/gif">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="../css/css-resets.css">
    <!-- css for create_pets.php.php -->
    <link rel="stylesheet" href="../css/delete_pets.css">
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "header.php" ?>
    <div class="delete_pets min-vh-100">

        <div id="layer">
            <div class="form_div">
                <div class="delete_pet_title">
                    <div id="back_div"><a href="my_pets.php"> <img src="../images/backTo.png" id="backTo"></a></div>
                    <div id="title_div">
                        <h4 class="mb-4" style="text-transform:capitalize;">
                            Delete <?php
                                    // display the name of the pet

                                    $getID = $_GET['pet_id'];
                                    $sql = "SELECT petID, name FROM pet WHERE petID = '$getID'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo $row['name']  . "?";
                                            $_SESSION['petID'] = $row['petID'];
                                        }
                                    } else {
                                        $conn->close();
                                        echo "<script>alert('Oops! Technical Error')</script>";
                                        echo "<script>
                                          window.location.href='my_pets.php';
                                         </script>";
                                        exit();
                                    }


                                    // // check if $_GET['pet_id'] is owned by the logged in user
                                    $get_petID = $_GET['pet_id'];
                                    $sql = "SELECT userID FROM pet WHERE petID = '$get_petID'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            if ($row['userID'] != $_SESSION['userID']) {


                                                // echo ' <script>alert("You cannot do that here boy..tsk tsk");</script>';
                                                echo "<script>alert('Oops! Technical Error')</script>";
                                                echo '<script>window.location.href = "my_pets.php"</script>';
                                                // header("location: my_pets.php");
                                                exit();
                                            }
                                        }
                                    }
                                    ?>
                        </h4>
                    </div>
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="delete_pet_form" method="post">


                    <!-- delete button -->
                    <div class=" delete_button mb-2">
                        <input type="submit" class="btn btn-primary btn_delete_pet" name="btn_delete_pet" id="btn_delete_pet" value="Delete">
                    </div>

                    <!-- cancel button -->
                    <div class="cancel_button mb-2">
                        <a href="my_pets.php">
                            <input type="button" class="btn btn-primary btn_cancel_pet" name="btn_cancel_pet" id="btn_cancel_pet" value="Cancel">
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('my_pets').style.backgroundColor = 'rgb(' + 85 + ',' + 48 + ',' + 8 + ',' + 0.918 + ')';
    </script>
</body>

</html>

<?php
$conn->close();

?>