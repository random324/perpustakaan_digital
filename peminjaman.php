<h1 class="mt=4">Peminjaman Buku</h1>

<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="col-mb-12">
                <a href="?page=peminjaman_tambah" target="_blank" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Peminjaman</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.user_id = peminjaman.user_id LEFT JOIN buku ON buku.buku_id = peminjaman.buku_id WHERE peminjaman.user_id=" . $_SESSION['user']['user_id']);
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td>
                                <?php if ($data['status'] != 'dikembalikan') {
                                ?>
                                    <a href="?page=peminjaman_ubah&&id=<?php echo $data['peminjaman_id']; ?>" class="btn btn-warning">Edit</a>

                                    <form method="post" style="display: inline;">
                                        <input type="hidden" name="buku_id_lama" value="<?php echo $data['buku_id']; ?>">
                                    </form>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>