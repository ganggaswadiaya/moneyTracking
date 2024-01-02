<?php

include 'koneksi.php';

$id_dana = $_POST['id_dana'];
$untk = $_POST['untuk'];
$hrg = $_POST['harga'];
$jmlh = $_POST['jumlah'];
$total = $jmlh * $hrg;
$tgl = $_POST['tanggal'];

$query = "INSERT INTO tb_pengeluaran values(null,'$id_dana','$untk', '$hrg', '$jmlh', '$total', '$tgl')";
$hasil = mysqli_query($conn, $query);

if (!$hasil) {
    die("Gagal menambahkan pemasukan" . mysqli_error($conn));
} else {
    $query_saldo_dana = "SELECT saldo FROM tb_dana WHERE id_dana=$id_dana";
    $saldo_dana = (int) mysqli_fetch_assoc(mysqli_query($conn, $query_saldo_dana))['saldo'];

    $saldo_dana = $saldo_dana - $total;
    $query_update_dana = "UPDATE tb_dana SET saldo=$saldo_dana WHERE id_dana=$id_dana";
    $update_dana = mysqli_query($conn, $query_update_dana);
    echo "<script>alert('Berhasil menambahkan pengeluaran');
        location.href='riwayat_pengeluaran.php';</script>";
}
