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
    <link rel="stylesheet" href="../../css/admin/admin-login.css">
</head>

<body>
    <div class="adm-log container">
        <div class="row">
            <div class="col">
                <form action="" class="frm-adm-login">
                    <h4>Sign in as Administrator</h4>
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
                    <!-- <div class="signup">
                        <p><a href="">Forgot Password</a></p>
                        <p>Don't have an account? <span><a href="">Sign Up</a> </span></p>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</body>

</html>