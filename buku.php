<h1 class="mt=4">Buku</h1>

<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="col-mb-12">
                <a href="?page=buku_tambah" class="btn btn-primary mb-3">+ Tambah Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategori on buku.kategori_id = kategori.kategori_id");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['penulis']; ?></td>
                            <td><?php echo $data['penerbit']; ?></td>
                            <td><?php echo $data['tahun_terbit']; ?></td>
                            <td><?php echo $data['stok']; ?></td>
                            <td>
                                <a href="?page=buku_ubah&&id=<?php echo $data['buku_id']; ?>" class="btn btn-warning">Edit</a>
                                <a onclick="return confirm('Anda yakin ingin menghapus data ini?');" href="?page=buku_hapus&&id=<?php echo $data['buku_id']; ?>" class="btn btn-danger">Hapus</a>

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