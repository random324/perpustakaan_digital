<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $kategori_id = $_POST['kategori_id'];
                        $judul = $_POST['judul'];
                        $penulis = $_POST['penulis'];
                        $penerbit = $_POST['penerbit'];
                        $tahun_terbit = $_POST['tahun_terbit'];
                        $stok = $_POST['stok']; // Ambil jumlah stok dari form
                    
                        $query = mysqli_query($koneksi, "INSERT INTO buku(kategori_id,judul,penulis,penerbit,tahun_terbit,stok) values ('$kategori_id','$judul','$penulis','$penerbit','$tahun_terbit','$stok')");
                    
                        if ($query) {
                            echo '<script>alert("Tambah data berhasil!");</script>';
                        } else {
                            echo '<script>alert("Tambah data gagal!");</script>';
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-4">Kategori</div>
                        <div class="col-md-8">
                            <select name="kategori_id" class="form_control">
                                <?php
                                $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($kategori = mysqli_fetch_array($kat)) {
                                ?>
                                    <option value="<?php echo $kategori['kategori_id']; ?>"><?php echo $kategori['kategori']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Judul</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="judul"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Penulis</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="penulis"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Penerbit</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="penerbit"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Tahun Terbit</div>
                        <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Stok</div>
                        <div class="col-md-8"><input type="number" class="form-control" name="stok"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=buku" class="btn btn-danger">Return</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>