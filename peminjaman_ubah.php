<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
<?php
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $buku_id = $_POST['buku_id'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status = $_POST['status'];

    // Dapatkan data peminjaman
    $query_peminjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE peminjaman_id=$id");
    $data_peminjaman = mysqli_fetch_array($query_peminjaman);
    $buku_id_lama = $data_peminjaman['buku_id'];
    $status_lama = $data_peminjaman['status'];

    // Perbarui status peminjaman
    $query_update_peminjaman = mysqli_query($koneksi, "UPDATE peminjaman SET buku_id='$buku_id', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status='$status' WHERE peminjaman_id=$id");

    // Perbarui jumlah stok buku jika status sebelumnya adalah 'dipinjam' dan status yang baru adalah 'dikembalikan'
    if ($status_lama == 'dipinjam' && $status == 'dikembalikan') {
        // Dapatkan jumlah stok buku sebelumnya
        $query_stok = mysqli_query($koneksi, "SELECT stok FROM buku WHERE buku_id=$buku_id_lama");
        $data_stok = mysqli_fetch_array($query_stok);
        $stok_sebelumnya = $data_stok['stok'];

        // Perbarui jumlah stok buku
        $stok_baru = $stok_sebelumnya + 1;
        $query_update_stok = mysqli_query($koneksi, "UPDATE buku SET stok=$stok_baru WHERE buku_id=$buku_id_lama");
    }

    if ($query_update_peminjaman && $query_update_stok) {
        echo '<script>alert("Ubah data berhasil!");</script>';
    } else {
        echo '<script>alert("Ubah data gagal!");</script>';
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE peminjaman_id=$id");
$data = mysqli_fetch_array($query);
?>

                    <input type="hidden" name="buku_id_lama" value="<?php echo $data['buku_id']; ?>">
                    <div class="row mb-3">
                        <div class="col-md-4">Buku</div>
                        <div class="col-md-8">
                            <select name="buku_id" class="form_control">
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                while ($buku = mysqli_fetch_array($buk)) {
                                ?>
                                    <option <?php if ($buku['buku_id'] == $data['buku_id']) echo ' selected'; ?> value="<?php echo $buku['buku_id']; ?>"><?php echo $buku['judul']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Tanggal Peminjaman</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" value="<?php echo $data['tanggal_peminjaman']; ?>" name="tanggal_peminjaman">
                        </div>
                    </div>
                    <!-- Tambahkan input untuk tanggal pengembalian -->
                    <div class="row mb-3">
                        <div class="col-md-4">Tanggal Pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" value="<?php echo $data['tanggal_pengembalian']; ?>" name="tanggal_pengembalian">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Status</div>
                        <div class="col-md-8">
                            <select name="status" class="form-control">
                                <option value="dipinjam" <?php if ($data['status'] == 'dipinjam') echo ' selected'; ?>>Dipinjam</option>
                                <!-- Tambahkan opsi untuk status "Dikembalikan" -->
                                <option value="dikembalikan" <?php if ($data['status'] == 'dikembalikan') echo ' selected'; ?>>Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Return</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
