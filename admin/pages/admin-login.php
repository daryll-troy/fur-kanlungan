<?php
include "../../pages/connect.php";

session_start();
//check if the user, not admin, has already logged in
if(isset($_SESSION['userID'])){
    header("location: ../../index.php");
    exit();
}
?>

<!-- Login Process -->
<?php
// value of error divs
$err_mess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //for getting the value of username and email if they exist in the database
    $getAdID = "";
    $getUs = "";
   
    $getPa = "";
    $row = "";
    // get user login inputs
    $email = trim(htmlspecialchars(strtolower($_POST['email'])));
    $password = trim(htmlspecialchars(strtolower($_POST['pwd'])));
   

    if (!empty($email) && !empty($password)) {
        // get the username and password from the database if it exists
        $sql = "SELECT adminID, username, password FROM admin WHERE username = '$email'  LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // get userID, email, and username
                $getAdID = $row['adminID'];
                $getUs = $row['username'];
              
                // match the password
                if ($password === $row['password'])
                    $getPa = "password match";
                else {
                    $err_mess = "Invalid Credential(s)";
                    
                }
            }
        } else {
            if (!empty($email)) {
                // give value to error divs
                
                $err_mess = "Invalid Credential(s)";
                
            }
        }

    }

    // direct to dashboard.php if all inputs are exisiting in the database
    if (!empty($getUs) && !empty($getPa)) {
        $_SESSION['adminID'] = $getAdID;
        $_SESSION['username'] = $email;
        $conn->close();
        header("location: admin_dashboard.php");
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
    <title>Fur-Kanlungan | Admin Login</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/css-resets.css">
    <link rel="stylesheet" href="../css/admin-login.css">
</head>

<body>
     <div class="form-container igitna min-vh-100">
            <div class="admin-login container igitna">
                <div class="row">
                    <div class="col">
                        <div class="display-logo">
                            <img src="../../images/logo.gif" alt="logo" class="logo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4 class="mb-4 sign-in-as-admin">Administrator</h4>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="frm-admin-login">
                        <div> <small id="err_mess"><?php //echo $err_mess; ?></small></div>
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label lblemail">Username:</label>
                                <input type="text" class="form-control txtemail" id="email" placeholder="Enter email" name="email">
                            </div>
                            <div class="mb-4">
                                <label for="pwd" class="form-label">Password:</label>
                                <input type="password" class="form-control txtpwd " id="pwd" placeholder="Enter password" name="pwd">
                            </div>
                            <div class="igitna">
                                <button type="submit" class="btn btn-primary submit-login">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>