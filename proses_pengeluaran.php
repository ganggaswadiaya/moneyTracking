<?php

include 'koneksi.php';

$id_dana = $_POST['id_dana'];
$untk = $_POST['untuk'];
$hrg = $_POST['harga'];
$jmlh = $_POST['jumlah'];
$total = $jmlh * $hrg;
$tgl = $_POST['tanggal'];

$query = "INSERT INTO tb_pengeluaran values('','$id_dana','$untk', '$hrg', '$jmlh', '$total', '$tgl')";
$hasil = mysqli_query($conn, $query);

if (!$hasil) {
    die("Gagal menambahkan pemasukan" . mysqli_error($conn));
} else {
    echo "<script>alert('Berhasil menambahkan pengeluaran');
        location.href='riwayat_pengeluaran.php';</script>";
}
