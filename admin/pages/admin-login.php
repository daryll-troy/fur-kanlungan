
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
                        <form action="" class="frm-admin-login">
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label lblemail">Email:</label>
                                <input type="email" class="form-control txtemail" id="email" placeholder="Enter email" name="email">
                            </div>
                            <div class="mb-4">
                                <label for="pwd" class="form-label">Password:</label>
                                <input type="password" class="form-control txtpwd " id="pwd" placeholder="Enter password" name="pswd">
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