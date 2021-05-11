<?php
    require 'config.php';
    

    // cek login
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // mencocokan database ada atau engga
        $cekdatabase = mysqli_query($conn, "SELECT * FROM admin where username ='$username' and password='$password'");

        // hitung jumlah data
        $hitung = mysqli_num_rows($cekdatabase);

        if($hitung > 0){
            $_SESSION['log'] = 'True';
            header('location:admin/index.php');
        } else {
            header('location:login.php');
        }
    }


if(!isset($_SESSION['log'])){

} else{
    header('location:admin/index.php');
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Form Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Username</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="text"
                                                placeholder="Masukan Username" name="username" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" type="password"
                                                placeholder="Masukan password" name="password" />
                                        </div>
                                        <div class="form-group d-flex align-items-center mt-4 mb-0">
                                            <button class="btn btn-primary btn-login" name="login">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>