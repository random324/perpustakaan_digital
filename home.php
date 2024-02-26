<h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>

                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori"));
                                    ?>
                                    Total Kategori</div>
                                    
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    
                                    <div class="card-body">
                                        <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku"));
                                    ?>
                                    Total Buku</div>
                                    
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ulasan"));
                                    ?>
                                    Total Ulasan</div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user"));
                                    ?>
                                    Total User</div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card">
    <div class="card-body">
        <table class="table table-border">

            <tr>
                <td width="100">Nama</td>
                <td width="1">:</td>
                <td><?php echo $_SESSION['user']['nama']; ?></td>
            </tr>
            <tr>
                <td width="100">Role User</td>
                <td width="1">:</td>
                <td><?php echo $_SESSION['user']['level']; ?></td>
            </tr>
            <tr>
                <td width="100">Tanggal</td>
                <td width="1">:</td>
                <td><?php echo date('d-m-Y'); ?></td>
            </tr>
        </table>
    </div>
</div>
 