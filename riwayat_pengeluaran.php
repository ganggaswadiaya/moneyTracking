<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Riwayat Pengeluaran</title>
    <link rel="stylesheet" href="./src/style/style.css" />
    <link rel="stylesheet" href="./src/style/style-riwayat.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
    <style>
        main {
            margin-bottom: 100px;
        }
    </style>
    <header>
        <div class="toogle">
            <div class="pemasukan">
                <a href="riwayat_pemasukan.php">Pemasukan</a>
            </div>
            <div class="pengeluaran active">
                <a href="riwayat_pengeluaran.php">Pengeluaran</a>
            </div>
        </div>
    </header>

    <main>
        <form method="post" style="color: #fff; position: relative; margin-top: -130px; margin-bottom: 30px; padding: 30px;">
            <table>
                <tr>
                    <td>Dari</td>
                    <td><input type="date" name="dari_tgl" required style="border: 0; background: transparent; color: #fff;"></td>
                </tr>
                <tr>
                    <td>Sampai</td>
                    <td><input type="date" name="sampai_tgl" required style="border: 0; background: transparent; color: #fff;"></td>
                    <td><input type="submit" name="filter" value="Cari" style="border: 0; background-color: white; padding: 3px 5px; border-radius: 10px;"></td>
                </tr>
            </table>
        </form>
        <?php
        include 'koneksi.php';
        // memfilter bulan pemasukan dan pengeluaran
        if (isset($_POST['filter'])) {
            $dari_tgl = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
            $sampai_tgl = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
            // memfilter pemasukan
            $query_total_saldo = "SELECT SUM(penghasilan) AS total_saldo FROM tb_pemasukan WHERE tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl'";
            $result_total_saldo = mysqli_query($conn, $query_total_saldo);
            $row_total_saldo = mysqli_fetch_assoc($result_total_saldo);

            // memfilter pengeluaran
            $query_total_pengeluaran = "SELECT SUM(total) AS total_saldo_pengeluaran FROM tb_pengeluaran WHERE tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl'";
            $result_total_saldo = mysqli_query($conn, $query_total_pengeluaran);
            $row_total_pengeluaran = mysqli_fetch_assoc($result_total_saldo);
        } else {

            // mengambil total pemasukan untuk di tampilkan
            $query_total_saldo = "SELECT SUM(penghasilan) AS total_saldo FROM tb_pemasukan";
            $result_total_saldo = mysqli_query($conn, $query_total_saldo);
            $row_total_saldo = mysqli_fetch_assoc($result_total_saldo);

            // mengambil total pengeluaran untuk di tampilkan
            $query_total_pengeluaran = "SELECT SUM(total) AS total_saldo_pengeluaran FROM tb_pengeluaran";
            $result_total_saldo = mysqli_query($conn, $query_total_pengeluaran);
            $row_total_pengeluaran = mysqli_fetch_assoc($result_total_saldo);
        }

        // mengambil data kategori pada tabel dana
        $query_join = mysqli_query($conn, "SELECT category FROM tb_dana INNER JOIN tb_pemasukan USING(id_dana)");
        $cek = mysqli_fetch_assoc($query_join);

        ?>
        <div class="pemasukanKeluaran">
            <div class="cardPemasukan">
                <div class="titleCardPemasukan">
                    <img src="./src/image/Arrow 1.png" alt="">
                    <p>Pemasukan</p>
                </div>
                <div class="jmlhPemasukan">
                    <h2>IDR <?= number_format($row_total_saldo['total_saldo']) ?></h2>
                </div>
            </div>
            <div class="cardPemasukan">
                <div class="titleCardPemasukan">
                    <img src="./src/image/Arrow 2.png" alt="">
                    <p>Pengeluaran</p>
                </div>
                <div class="jmlhPemasukan">
                    <h2>IDR <?= number_format($row_total_pengeluaran['total_saldo_pengeluaran']) ?></h2>
                </div>
            </div>
        </div>

        <?php

        include 'koneksi.php';

        // memfilter bulan pemasukan dan pengeluaran
        if (isset($_POST['filter'])) {
            $dari_tgl = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
            $sampai_tgl = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
            $query = "SELECT * FROM tb_pengeluaran WHERE tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl'";
            $hasil = mysqli_query($conn, $query);
        } else {
            $query = 'SELECT * FROM tb_pengeluaran';
            $hasil = mysqli_query($conn, $query);
        }

        while ($data = mysqli_fetch_assoc($hasil)) {
        ?>
            <div class="transaksiTerbaru transaksi">
                <div class="contenTransaksiTerbaru" style="margin: 2rem 0;">
                    <div class="cardTransaksiTerbaru">
                        <div class="titleCardTransaksi">
                            <div class="transaksiIcon">
                                <img src="./src/image/shopping.png" alt="food icon" />
                            </div>
                            <div class="titleTransaksi">
                                <h3><?= $data['untuk'] ?></h3>
                                <p><?= $cek['category'] ?></p>
                            </div>
                        </div>
                        <div class="hargaBrng">
                            <h3 style="color: red;">- <?= number_format($data['total']) ?></h3>
                            <p><?= $data['tanggal'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </main>

    <footer>
        <div class="containerFooterNavbar">
            <div class="homeicon">
                <a href="index.php"><img src="./src/image/homeIcon.png" alt="home" /></a>
            </div>
            <div class="createIcon">
                <a href="buat_transaksi.php"><img src="./src/image/createIcon.png" alt="create" /></a>
            </div>
            <div class="historyIcon active">
                <a href="riwayat_pengeluaran.php"><img src="./src/image/historyIcon.png" alt="history" /></a>
            </div>
        </div>
    </footer>
</body>

</html>