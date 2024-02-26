<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $alamat = $_POST['alamat'];
                        $level = $_POST['level'];
                        $query = mysqli_query($koneksi, "UPDATE user set username='$username',nama='$nama',email='$email',alamat='$alamat',level='$level' WHERE user_id = $id");

                        if ($query) {
                            echo '<script>alert("ubah data behasil!");</script>';
                        } else {
                            echo '<script>alert("ubah data gagal!");</script>';
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT*FROM user WHERE user_id=$id");
                    $data = mysqli_fetch_array($query);
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-4">Username</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['username']; ?>" class="form-control" name="username"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Nama</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['nama']; ?>" class="form-control" name="nama"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Email</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['email']; ?>" class="form-control" name="email"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Alamat</div>
                        <div class="col-md-8">
                            <textarea name="alamat" class="form-control" rows="5"><?php echo $data['alamat']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Level</div>
                        <select name="level" class="col-md-8" rows="5">
                            <option value="admin">admin</option>
                            <option value="petugas">petugas</option>
                            <option value="peminjam">peminjam</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=user" class="btn btn-danger">Return</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>