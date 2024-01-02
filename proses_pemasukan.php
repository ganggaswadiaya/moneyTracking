<?php

include 'koneksi.php';

$sumber = $_POST['sumber'];
$id_dana = $_POST['id_dana'];
$penghsln = $_POST['penghasilan'];
$tgl = $_POST['tanggal'];

$query = "INSERT INTO tb_pemasukan values(null, '$sumber','$id_dana', '$penghsln', '$tgl')";

$hasil = mysqli_query($conn, $query);

if (!$hasil) {
    die("Gagal menambahkan pemasukan" . mysqli_error($conn));
} else {
    $query_saldo_dana = "SELECT saldo FROM tb_dana WHERE id_dana=$id_dana";
    $saldo_dana = (int) mysqli_fetch_assoc(mysqli_query($conn, $query_saldo_dana))['saldo'];

    $saldo_dana = $saldo_dana + $penghsln;
    $query_update_dana = "UPDATE tb_dana SET saldo=$saldo_dana WHERE id_dana=$id_dana";
    $update_dana = mysqli_query($conn, $query_update_dana);

    echo "<script>alert('Berhasil menambahkan pemasukan');
        location.href='riwayat_pemasukan.php';</script>";
}
