<?php
// connect to database
include 'connect.php';
// start a session
session_start();

//NOTE: I will not be using confirmation alert anymore as i can't make it work with php

// reject the pet
if (isset($_GET['reject_pet'])) {
    $sql = "UPDATE pet SET status = 'posted', given_to = 999999 WHERE petID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['reject_pet']);
    $stmt->execute();
}

// accept the pet
if (isset($_GET['accept_pet'])) {
    // set the timezone to philippines
    date_default_timezone_set('Asia/Manila');
    $date_time = date("Y-m-d h:i:sa");
    // set the status to given
    $sql = "UPDATE pet SET status = 'given', date_time = ? WHERE petID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $date_time, $_GET['accept_pet']);
    $stmt->execute();

    // copy pet_photo to deledopted_photo
    $sql = "
          INSERT INTO deledopted_photo SELECT * FROM pet_photo WHERE petID = ? 
          ";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $_GET['accept_pet']);
    $result->execute();

    // delete photos from pet_photo
    $sql = "
    DELETE  FROM pet_photo WHERE petID = ?
    ";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $_GET['accept_pet']);
    $result->execute();

    // copy pet to deledopted
    $sql = "
     INSERT INTO deledopted SELECT * FROM pet WHERE petID = ? 
     ";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $_GET['accept_pet']);
    $result->execute();

    // delete pet from pet
    $sql = "
        DELETE  FROM pet WHERE petID = ?
        ";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $_GET['accept_pet']);
    $result->execute();
}
?>

<script>
    // go back to the chat_box with the same userID
    window.location.href = "pet_receive.php";
    // exit();
</script>

<?php
$conn->close();

?>