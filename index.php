<?php
// connect to database
include 'pages/connect.php';
// start a session
session_start();
// check if the user had already logged in
if (isset($_SESSION['userID'])) {
    header("location: pages/dashboard.php");
}
?>
<!-- Login Process -->
<?php
// value of error divs
$us_em_err_mess = $pass_err_mess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //for getting the value of username and email if they exist in the database
    $getUsID = "";
    $getUs = "";
    $getEm = "";
    $getPa = "";
    $row = "";
    // get user login inputs
    $email_or_username = trim(htmlspecialchars(strtolower($_POST['email_or_username'])));
    $password = trim(htmlspecialchars(strtolower($_POST['pwd'])));

    if (!empty($email_or_username) && !empty($password)) {
        // get the email or username from the database if it exists
        $sql = "SELECT userID, username, email FROM users WHERE username = '$email_or_username' OR email = '$email_or_username' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // get userID, email, and username
                $getUsID = $row['userID'];
                $getUs = $row['username'];
                $getEm = $row['email'];
            }
        } else {
            if (!empty($email_or_username)) {
                // give value to error divs
                // make the username/email seem correct or wrong if the username/email is wrong
                $pass_err_mess = "Invalid Credential(s)";
                $us_em_err_mess = "Invalid Credential(s)";
            }
        }

        //get the password from the database if it exists
        $sql = "SELECT password FROM users WHERE password = '$password' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // get password
                $getPa = $row['password'];
            }
        } else {
            if (!empty($password)) {
                // give value to error divs
                // make the username/email seem correct or wrong if the password is wrong
                $pass_err_mess = "Invalid Credential(s)";
                $us_em_err_mess = "Invalid Credential(s)";
            }
        }
    }

    // direct to dashboard.php if all inputs are exisiting in the database
    if (!empty($getUs) && !empty($getEm) && !empty($getPa)) {
        $_SESSION['userID'] = $getUsID;
        $conn->close();
        header("location: pages/dashboard.php");
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
    <title>Fur-Kanlungan</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- css reset -->
    <link rel="stylesheet" href="css/css-resets.css">
    <!-- css for index.php -->
    <link rel="stylesheet" href="css/index.css">
    <!-- css for pet-list.php-->
    <link rel="stylesheet" href="css/pet-list.css">
    <!-- css for footer.php -->
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <!-- Sign in and Sign up Section -->
    <section class="sign-in min-vh-100 igitna" id="sign-in">
        <!-- signup form -->
        <div class="blur-sapin igitna" id="blur-sapin"> </div>

        <div class="register" id="register">
            <form action="pages/sign-up.php" method="post" enctype="multipart/form-data" id="form_signup">
                <div class="label-create">Create Account</div>

                <div class="reg-add-padding">
                    <!-- name -->
                    <label for="reg-firstname" class="form-label  mt-2">Name</label>
                    <div class="names-in-row">
                        <input type="text" class="form-control" id="reg-firstname" placeholder="Enter First Name" name="reg-firstname">
                        <input type="text" class="form-control" id="reg-lastname" placeholder="Enter Last Name" name="reg-lastname">
                    </div>
                    <div> <small id="name_err" style="color: red;"></small></div>
                    <!-- email -->
                    <label for="reg-email" class="form-label mt-2 ">Email</label>
                    <input type="text" class="form-control" id="reg-email" placeholder="Enter Email" name="reg-email">
                    <div> <small id="email_err" style="color: red;"></small></div>
                    <!-- username -->
                    <label for="reg-username" class="form-label mt-2">Username</label>
                    <input type="text" class="form-control" id="reg-username" placeholder="Enter Username" name="reg-username">
                    <div> <small id="username_err" style="color: red;"></small></div>
                    <!-- password -->
                    <label for="reg-password" class="form-label mt-2">Password</label>
                    <input type="password" class="form-control" id="reg-password" placeholder="Enter Password" name="reg-password">
                    <div> <small id="password_err" style="color: red;"></small></div>
                    <!-- confirm password -->
                    <label for="reg-conf-password" class="form-label mt-2">Confirm Password</label>
                    <input type="password" class="form-control" id="reg-conf-password" placeholder="Confirm Password" name="reg-conf-password">
                    <div> <small id="conf_password_err" style="color: red;"></small></div>

                    <!-- municipality -->
                    <label for="municipality" class="form-label">Municipality</label>
                    <select class="form-select btn municipality" aria-label="Default select example" id="municipality" name="municipality">
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

                        mysqli_close($conn);
                        ?>
                    </select>
                    <div> <small id="municipality_err" style="color: red;"></small></div>

                    <!-- valid ID -->
                    <label for="reg-id" class="form-label mt-2">Valid I.D.</label>
                    <input class=" form-control" type="file" id="reg-id" name="reg-id" multiple accept=".jpg, .png, .jpeg">
                    <div> <small id="validid_err" style="color: red;"></small></div>

                    <!-- terms and conditions -->
                    <div class="back-to-signin igitna">
                        <p>By clicking sign up, you agree to the <span><a href="" class="terms_and_cond">Terms and Conditions</a> </span></p>
                    </div>
                    <div class="igitna mb-2">
                        <input type="button" class="btn btn-primary submit-reg" id="btn_signup" value="Validate">
                    </div>
                    <div class="back-to-signin igitna">
                        <p>Already have an account? <span id="link-signin" onclick="closeForm()">Sign In </span></p>
                    </div>

                </div>
            </form>
        </div>


        <!-- ============================== sign in ================================ -->
        <div class="container-fluid">
            <div class="sapin">
                <div class="row">
                    <div class="col-lg-3 igitna-logo">
                        <img src="images/logo.gif" alt="logo" class="logo">
                    </div>
                    <div class="col-lg-5 igitna">
                        <div class="browse-pets">
                            <h1>Fur-Kanlungan</h1>
                            <p>A web-based adoption system for furry pets in Pangasinan</p>
                            <!-- go to bookmarked pet-list id  -->
                            <a href="#pet-list"> <button type="submit" class="btn btn-primary browse-button">Browse Pets </button></a>
                        </div>

                    </div>
                    <div class="col-lg-4 igitna">
                        <div class="login igitna">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <h4 style="text-align: center;">Sign In to your Account</h4>
                                <div class="add-padding">
                                    <div class="mb-3 mt-3">
                                        <label for="email_or_username" class="form-label lblemail">Email/Username:</label>
                                        <input type="text" class="form-control txtemail" id="email_or_username" placeholder="Enter email/username" name="email_or_username">
                                        <div> <small id="us_em_err"><?php echo $us_em_err_mess; ?></small></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd" class="form-label">Password:</label>
                                        <input type="password" class="form-control txtpwd " id="pwd" placeholder="Enter password" name="pwd">
                                        <div> <small id="pass_err"><?php echo $pass_err_mess; ?></small></div>
                                    </div>
                                    <div class="igitna">
                                        <button class="btn btn-primary submit-login">Sign in</button>
                                    </div>
                                    <div class="signup">
                                        <p><a href="">Forgot Password&nbsp</a></p>
                                        <p>Don't have an account? <span onclick="openForm()" id="link-signup">Sign Up </span></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <?php include_once 'pages/pet-list.php'; ?>
    <?php include_once 'pages/footer.php'; ?>

    <!-- Javascript -->
    <script src="js/pop-up-sign-up.js"></script>
    <script src="js/hover.js"></script>
    <script src="js/check_sign_up.js"></script>

</body>

</html>