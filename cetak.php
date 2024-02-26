<h2 align="center">Laaporan peminjaman buku</h2>
<table border="1" cellpedding="0" cellspacing="0" width="100%">
    <tr>
        <th>No</th>
        <th>User</th>
        <th>Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Status</th>
    </tr>
    <?php
    include "koneksi.php";
    $i = 1;
    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.user_id = peminjaman.user_id LEFT JOIN buku on buku.buku_id = peminjaman.buku_id");
    while ($data = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['judul']; ?></td>
            <td><?php echo $data['tanggal_peminjaman']; ?></td>
            <td><?php echo $data['tanggal_pengembalian']; ?></td>
            <td><?php echo $data['status']; ?></td>
        </tr>
    <?php
    }
    ?>
    <script>
        window.print();
        setTimeout(function() {
            window.close();
        }, 100);
    </script>
</table>