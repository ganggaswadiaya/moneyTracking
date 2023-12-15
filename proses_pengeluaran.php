<?php

include 'koneksi.php';

$untk = $_POST['untuk'];
$hrg = $_POST['harga'];
$jmlh = $_POST['jumlah'];
$id_dana = $_POST['id_dana'];
$tgl = $_POST['tanggal'];

$query = "INSERT INTO tb_pemasukan values('','$untk','$hrg', '$jmlh', '$id_dana', '$tgl')";

$hasil = mysqli_query($conn, $query);

if (!$hasil) {
    die("Gagal menambahkan pemasukan" . mysqli_error($conn));
} else {
    echo "<script>alert('Berhasil menambahkan pemasukan');
        location.href='riwayat_pengeluaran.php';</script>";
}
