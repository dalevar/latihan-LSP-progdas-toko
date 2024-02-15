<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="col pt-lg-5">
                    <div class="card shadow-sm">
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                        </div>
                        <div class="card-body">
                            <h5 class="text-center mt-4">SELEMAT DATANG DI TECHNOLOGY GALLERY</h5>
                            <h6 class="text-center">SMK ISFI BANJARMASIN</h6>

                            <form method="POST" class="p-lg-5">
                                <div class="input-group">
                                    <span class="input-group-text">Username</span>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="input-group mt-4">
                                    <span class="input-group-text">Password</span>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" name="login" class="btn btn-sm btn-outline-primary px-5 mb-5 w-50">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['login'])) {
        if ($_POST['email'] == "userlsp" && $_POST['password'] == "smkisfibjm") {
            header("location: index.php");
        } else {
            echo "
        <script>
            alert('Username atau Password salah!');
        </script>";
        }
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>