<h1 class="mt=4">Ulasan Buku</h1>

<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="col-mb-12">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>alamat</th>
                        <th>Level</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM user ");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td><?php echo $data['level']; ?></td>
                            <td>
                                <a href="?page=user_ubah&&id=<?php echo $data['user_id']; ?>" class="btn btn-warning">Edit</a>
                                <a onclick="return confirm('Anda yakin ingin menghapus data ini?');" href="?page=user_hapus&&id=<?php echo $data['user_id']; ?>" class="btn btn-danger">Hapus</a>

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