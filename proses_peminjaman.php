<?php
$buku_id = $_POST['buku_id'];
$query_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE buku_id = '$buku_id'");
$data_buku = mysqli_fetch_assoc($query_buku);

$stok_sekarang = $data_buku['stok'];
if ($stok_sekarang > 0) {
    $stok_sekarang -= 1;
    $query_update_stok = mysqli_query($koneksi, "UPDATE buku SET stok = '$stok_sekarang' WHERE buku_id = '$buku_id'");
    if (!$query_update_stok) {
        echo '<script>alert("Gagal mengurangi stok buku!");</script>';
    } else {
        echo '<script>alert("Stok buku berhasil dikurangi!");</script>';
    }
} else {
    echo '<script>alert("Stok buku habis!");</script>';
}

$stok_sekarang += 1;
$query_update_stok = mysqli_query($koneksi, "UPDATE buku SET stok = '$stok_sekarang' WHERE buku_id = '$buku_id'");
if (!$query_update_stok) {
    echo '<script>alert("Gagal menambahkan kembali stok buku!");</script>';
} else {
    echo '<script>alert("Stok buku berhasil ditambahkan kembali!");</script>';
}
?>