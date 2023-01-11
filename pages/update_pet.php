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
    <!-- css for footer.php -->
    <link rel="stylesheet" href="../css/footer.css">
    <!-- css for header.php -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- header -->
    <?php include "header.php"; ?>

    <div class="update_pets min-vh-100">
        <div id="layer">
            <div class="form_div">
                <div class="update_pet_title">
                    <div id="back_div"><a href="my_pets.php"> <img src="../images/backTo.png" id="backTo"></a></div>
                    <div id="title_div">
                        <h4 class="mb-4">Update Pet</h4>
                    </div>
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="create_pet_form" method="post" enctype="multipart/form-data">
                    <!-- Upload pics of the pet -->
                    <label for="upload_pics" class="form-label mt-2">Add Photos</label>
                    <input class=" form-control" type="file" id="upload_pics" name="upload_pics[]" multiple accept=".jpg, .png, .jpeg">
                    <div class="mb-2"> <small id="upload_pics_err" style="color: red;"></small></div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="1" placeholder="Text here..."></textarea>
                        <div class="mb-2"> <small id="description_err" style="color: red;"></small></div>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>