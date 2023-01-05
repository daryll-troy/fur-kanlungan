<?php
// connect to database
include 'pages/connect.php';
?>

<!-- Sign Up Validation -->
<?php

// define variables and set to empty values
// $fullname = $fullname_err = "";
// $fname = $fname_err = "";
// $lname = $lname_err = "";
// $username = $username_err = "";
// $email = $email_err = "";
// $password = $password_err = "";
// $conf_password = $conf_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if (empty($_POST["reg-firstname"]) || empty($_POST["reg-lastname"])) {
    //     $test = $_POST['reg-firstname'];
    //     $fullname_err = "Full name is required";
    //     echo "<script> console.log('$fullname_err')</script>";
    // } else {
    //     $fname = test_input($_POST["reg-firstname"]);
    //     $lname = test_input($_POST["reg-lastname"]);
    //     // check if name only contains letters and whitespace
    //     if (!preg_match("/^[a-zA-Z-' ]*$/", $fname) || !preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
    //         $fname_err = "Only letters and white space allowed";
    //         echo "<script>

    //         console.log('$fname_err')</script>";
    //     }

    // }

    // if (empty($_POST["reg_email"])) {
    //     $email_err = "Email is required";
    //     echo "<script>console.log('$email_err');</script>";

    // } else {

    //     $email = test_input($_POST["reg_email"]);
    //     // check if e-mail address is well-formed
    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         $email_err = "Invalid email format";
    //         echo "<script> console.log('$email_err')</script>";
    //     }
    // }

}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" id="form_signup">
                <div class="label-create">Create Account</div>

                <div class=" add-padding">
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
                        <option value="none">Select Municipality</option>
                        <?php
                        // select all municipality
                        $sql = "SELECT muni_name FROM municipality;";
                        $result = mysqli_query($conn,$sql);
    
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
                        <!-- <option value="1">One</option> -->
                    </select>
                    <div> <small id="municipality_err" style="color: red;"></small></div>

                    <!-- valid ID -->
                    <label for="reg-id" class="form-label mt-2">Valid I.D.</label>
                    <input class=" form-control" type="file" id="reg-id" name="reg-id" multiple accept=".jpg, .png">
                    <div> <small id="validid_err" style="color: red;"></small></div>

                    <!-- terms and conditions -->
                    <div class="back-to-signin igitna">
                        <p>By clicking sign up, you agree to the <span><a href="" class="terms_and_cond">Terms and Conditions</a> </span></p>
                    </div>
                    <div class="igitna mb-2">
                        <input type="button" class="btn btn-primary submit-reg" id="btn_signup" value="Sign Up">
                    </div>
                    <div class="back-to-signin igitna">
                        <p>Already have an account? <span id="link-signin" onclick="closeForm()">Sign In </span></p>
                    </div>

                </div>
            </form>
        </div>


        <!-- sign in -->
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
                            <form action="">
                                <h4 style="text-align: center;">Sign In to your Account</h4>
                                <div class="add-padding">
                                    <div class="mb-3 mt-3">
                                        <label for="email" class="form-label lblemail">Email:</label>
                                        <input type="email" class="form-control txtemail" id="email" placeholder="Enter email" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd" class="form-label">Password:</label>
                                        <input type="password" class="form-control txtpwd " id="pwd" placeholder="Enter password" name="pswd">
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