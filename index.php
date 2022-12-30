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
    <!-- Login Section -->
    <section class="sign-in min-vh-100 igitna">
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
                                <h4 style="text-align: center;">Sign in to your account</h4>
                                <div class="mb-3 mt-3">
                                    <label for="email" class="form-label lblemail">Email:</label>
                                    <input type="email" class="form-control txtemail" id="email" placeholder="Enter email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="pwd" class="form-label">Password:</label>
                                    <input type="password" class="form-control txtpwd " id="pwd" placeholder="Enter password" name="pswd">
                                </div>
                                <div class="igitna">
                                    <button type="submit" class="btn btn-primary submit-login">Sign in</button>
                                </div>
                                <div class="signup">
                                    <p><a href="">Forgot Password&nbsp</a></p>
                                    <p>Don't have an account? <span><a href="">Sign Up</a> </span></p>
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
    
    
</body>

</html>