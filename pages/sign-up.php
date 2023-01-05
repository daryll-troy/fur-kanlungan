<?php
// connect to database
include 'connect.php';
?>

<?php
$fname = $_POST['reg-firstname'];
$lname = $_POST['reg-lastname'];
$email = $_POST['reg-email'];
$username = $_POST['reg-username'];
$password = $_POST['reg-password'];
$conf_password = $_POST['reg-conf-password'];
$municipality = $_POST['municipality'];
$valid_id = $_FILES['reg-id'];
$muni_id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_FILES['reg-id'];


    // echo $_FILES['reg-id'];
    foreach ($id as $x => $x_value) {
        echo  $x . " => " . $x_value;
        echo "<br>";
    }

    // get the id of muni_id selected
    $sql = "SELECT muniID FROM municipality WHERE muni_name = '$municipality'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $muni_id = $row['muniID'];
        }
    }
    // File upload path
    $targetDir = "C:/xampp/htdocs/fur-kanlungan/images/valid_id/";
    $fileName = basename($_FILES["reg-id"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // // Upload file to server
    // if (move_uploaded_file($_FILES['reg-id']['tmp_name'], $targetFilePath)) {
    //     echo "File uploaded successfully!";

    //     // Insert image file name into database
    //     // prepare and bind
    //     $stmt = $conn->prepare("INSERT INTO users (username, email, password, fname, lname, photo_id, muniID) VALUES (?, ?, ?, ?, ?, ?, ?)");
    //     $stmt->bind_param("sssssss", $username, $email, $password, $fname, $lname, $fileName, $muni_id);
    //     $stmt->execute();
    //     $conn->close();
    // } else {
    //     echo "Sorry, file not uploaded, please try again!";
    // }
    // header("location: ../index.php");
    // exit();

    // Get images from the database
    $query = $conn->query("SELECT photo_id FROM users limit 1");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $imageURL = '../images/valid_id/' . $row["photo_id"];
            echo $imageURL;
        }
    }
}

?>
<img src="<?php echo $imageURL; ?>" alt="" />