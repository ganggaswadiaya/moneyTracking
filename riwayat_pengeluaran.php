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
        <div class="pemasukanKeluaran">
            <div class="cardPemasukan">
                <div class="titleCardPemasukan">
                    <img src="./src/image/Arrow 1.png" alt="">
                    <p>Pemasukan</p>
                </div>
                <div class="jmlhPemasukan">
                    <h2>IDR 1.200.000</h2>
                </div>
                <div class="createSaldoATM">
                </div>
            </div>
            <div class="cardPemasukan">
                <div class="titleCardPemasukan">
                    <img src="./src/image/Arrow 2.png" alt="">
                    <p>Pengeluaran</p>
                </div>
                <div class="jmlhPemasukan">
                    <h2>IDR 200.000</h2>
                </div>
                <div class="createSaldoATM">
                </div>
            </div>
        </div>

        <?php

        include 'koneksi.php';

        $query = 'SELECT * FROM tb_pengeluaran';
        $hasil = mysqli_query($conn, $query);

        while ($data = mysqli_fetch_assoc($hasil)) {
        ?>
            <div class="transaksiTerbaru transaksi">
                <div class="contenTransaksiTerbaru">
                    <div class="cardTransaksiTerbaru">
                        <div class="titleCardTransaksi">
                            <div class="transaksiIcon">
                                <img src="./src/image/shopping.png" alt="food icon" />
                            </div>
                            <div class="titleTransaksi">
                                <h3><?= $data['untuk'] ?></h3>
                                <p><?= $data['id_dana'] ?></p>
                            </div>
                        </div>
                        <div class="hargaBrng">
                            <h3>- <?= $data['harga'] ?></h3>
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