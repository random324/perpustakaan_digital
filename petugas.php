<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
    <title>Register</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="loginS" style="background-image: url('assets/img/bgperpus6.jpg');background-position:center;background-repeat:no-repeat;background-size:cover;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Register Perpustakaan Digital</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['register'])) {
                                        $nama = $_POST['nama'];
                                        $username = $_POST['username'];
                                        $email = $_POST['email'];
                                        $alamat = $_POST['alamat'];
                                        $password = md5($_POST['password']);
                                        $level = $_POST['level'];

                                        $insert = mysqli_query($koneksi, "INSERT INTO user(nama, username, email, password, alamat , level) VALUES('$nama','$username','$email','$password','$alamat','$level')");
                                        if ($insert) {
                                            echo '<script>alert("Register Berhasil!"); location.href="index.php"</script>';
                                        } else {
                                            echo '<script>alert("Register Gagal!");</script>';
                                        }
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="small mb-1">Nama Lengkap</label>
                                            <input class="form-control py-4" type="text" name="nama" placeholder="Masukkan Nama Lengkap" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Username</label>
                                            <input class="form-control py-4" type="username" name="username" placeholder="Masukkan Username" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Email</label>
                                            <input class="form-control py-4" type="text" name="email" placeholder="Masukkan Email" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Masukkan Password" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Level</label>
                                            <select name="level" required class="form-control">
                                                <option value="petugas">Petugas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Alamat</label>
                                            <textarea name="alamat" rows="5" required class="form-control"> </textarea>

                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-secondary" type="submit" name="register" value="register">Register</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>