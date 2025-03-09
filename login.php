<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT TEL LOGIN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/admin/dist/css/adminlte.min.css">
    <link href="asset/home/img/logo.png" rel="icon">
    <style>
        body {
            background-image: url('foto/admin.jpg');
            height: 950px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .btn-grad {
            background-image: linear-gradient(to right, #1FA2FF 0%, #12D8FA 51%, #1FA2FF 100%);
            margin: 5px;
            padding: 5px 40px;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
        }

        .btn-grad:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>LOGIN</b></a>
            </div>
            <div class="card-body">

                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-grad btn-block" name="login" value="login">Login</button>
                    </div>
                </form>
                <?php session_start();
                include 'koneksi.php';
                if (isset($_POST["login"])) {
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $ambil = $koneksi->query("SELECT * FROM admin
		                                    WHERE email='$email' AND password='$password' limit 1");
                    $akunyangcocok = $ambil->num_rows;
                    if ($akunyangcocok == 1) {
                        $akun = $ambil->fetch_assoc();
                        $_SESSION['admin'] = $akun;
                        echo "<script> alert('Login Berhasil');</script>";
                        echo "<script> location ='index.php';</script>";
                    } else {
                        echo "<script> alert('Anda gagal login, Cek akun anda');</script>";
                        echo "<script> location ='login.php';</script>";
                    }
                }
                ?>

            </div>
        </div>
    </div>
</body>

<script src="assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/admin/dist/js/adminlte.min.js"></script>
</body>

</html>