<h1 class="mt=4">Ulasan Buku</h1>

<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="col-mb-12">
                <a href="?page=ulasan_tambah" class="btn btn-primary mb-3">+ Tambah Data</a>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM ulasan LEFT JOIN user on user.user_id = ulasan.user_id LEFT JOIN buku on buku.buku_id = ulasan.buku_id");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['ulasan']; ?></td>
                            <td><?php echo $data['rating']; ?></td>
                            <td>
                                <a href="?page=ulasan_ubah&&id=<?php echo $data['ulasan_id']; ?>" class="btn btn-warning">Edit</a>
                                <a onclick="return confirm('Anda yakin ingin menghapus data ini?');" href="?page=ulasan_hapus&&id=<?php echo $data['ulasan_id']; ?>" class="btn btn-danger">Hapus</a>

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