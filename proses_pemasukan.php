<?php

include 'koneksi.php';

$sumber = $_POST['sumber'];
$id_dana = $_POST['id_dana'];
$penghsln = $_POST['penghasilan'];
$tgl = $_POST['tanggal'];

$query = "INSERT INTO tb_pemasukan values('','$sumber','$id_dana', '$penghsln', '$tgl')";

$hasil = mysqli_query($conn, $query);

if (!$hasil) {
    die("Gagal menambahkan pemasukan" . mysqli_error($conn));
} else {
    echo "<script>alert('Berhasil menambahkan pemasukan');
        location.href='riwayat_pemasukan.php';</script>";
}
