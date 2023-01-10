<?php
// connect to database
include 'connect.php';
?>

<?php
//  Sign Up upload to database

$fname = htmlspecialchars(strtolower($_POST['reg-firstname']));
$lname = htmlspecialchars(strtolower($_POST['reg-lastname']));
$email = htmlspecialchars(strtolower($_POST['reg-email']));

$username = htmlspecialchars(strtolower($_POST['reg-username']));
$password = htmlspecialchars(strtolower($_POST['reg-password']));
$conf_password = htmlspecialchars(strtolower($_POST['reg-conf-password']));
$municipality = htmlspecialchars(strtolower($_POST['municipality']));

$muni_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the id of muni_id selected
    $sql = "SELECT muniID FROM municipality WHERE muni_name = '$municipality' LIMIT 1";
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
    // $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


    // echo "Phtoto id uploaded to server successfully!</br> ";

    // Insert image file name into database
    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, fname, lname, photo_id, muniID) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $username, $email, $password, $fname, $lname, $fileName, $muni_id);

    // check exception if username of email already exists in the database
    try {
        $stmt->execute();
        // close connection
        $conn->close();
        echo "<script>alert('Sign Up Successful!')</script>";  
    } catch (Exception $stmt) {
        // counter for determining whether an email or username already exist in the database

        $countEmail = 0;
        $countUsername = 0;
        // check if username already exists in the database
        $sql = "SELECT username FROM users WHERE username = '$username'";
        $result_username = $conn->query($sql);
        if ($result_username->num_rows > 0) {
            $countUsername = 1;
        }

        // check if email already exists in the database
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $result_email = $conn->query($sql);
        if ($result_email->num_rows > 0) {
            $countEmail = 1;
        }

        if ($countEmail == 1 && $countUsername == 0) {

            echo "<script>alert('Email is already taken!')</script>";
            $conn->close();
            // head back to index.php
            echo "<script>
                    window.location.href='../index.php';
                    </script>";
            exit();
        } else if ($countEmail == 0 && $countUsername == 1) {

            $conn->close();
            echo "<script>alert('Username is already taken!')</script>";
            // head back to index.php
            echo "<script>
                        window.location.href='../index.php';
                        </script>";
            exit();
        } else if ($countEmail == 1 && $countUsername == 1) {
            // alert when both username and email already exist

            echo "<script>alert('Username and Email are already taken!')</script>";
            $conn->close();
            // head back to index.php
            echo "<script>
                window.location.href='../index.php';
                </script>";
            exit();
        }
    } finally {
        // Upload file to server
        if (move_uploaded_file($_FILES['reg-id']['tmp_name'], $targetFilePath)) {
            // echo "<script>alert('Photo id uploaded to server!')</script>";
            // head back to index.php
            echo "<script>
                    window.location.href='../index.php';
            </script>";
            exit();
        } else {
            
            // echo "<script>alert('Sorry, photo id not uploaded to server, please try again!')</script>";
            // head back to index.php
            echo "<script>
                    window.location.href='../index.php';
            </script>";
            exit();
        }
    }
}

?>