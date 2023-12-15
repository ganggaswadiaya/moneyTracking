<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="./src/style/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Home</title>
</head>

<body>
  <header>
    <div class="profile">
      <div class="pic">
        <img src="./src/image/profilePict.png" alt="profile picture" />
      </div>
      <div class="name">
        <p>Selamat Datang</p>
        <h4>Gangga Swadiaya</h4>
      </div>
    </div>

    <?php

    include "koneksi.php";
    // Mengambil saldo dompet pada field dana dengan menggunakan id
    $query_dompet = mysqli_query($conn, "SELECT * FROM tb_dana where id_dana='3'");

    // Mengambil saldo dompet pada field dana dengan menggunakan id
    $query_bank = mysqli_query($conn, "SELECT *  FROM tb_dana where id_dana='2'");

    $dompet = mysqli_fetch_assoc($query_dompet);
    $bank = mysqli_fetch_assoc($query_bank);

    ?>

    <div class="pemasukanKeluaran">
      <div class="cardPemasukan">
        <div class="titleCardPemasukan">
          <p>Saldo ATM</p>
        </div>
        <div class="jmlhPemasukan">
          <h2>IDR <?= number_format($bank['saldo']) ?></h2>
        </div>
        <div class="createSaldoATM">
        </div>
      </div>
      <div class="cardPemasukan">
        <div class="titleCardPemasukan">
          <p>Saldo Dompet</p>
        </div>
        <div class="jmlhPemasukan">
          <h2>IDR <?= number_format($dompet['saldo']) ?></h2>
        </div>
        <div class="createSaldoATM">
        </div>
      </div>
    </div>
  </header>

  <main>
    <div class="transaksiTerbaru">
      <div class="titleTransaksiTerbaru">
        <h1>Transaksi Terbaru</h1>
        <a href="riwayat_pengeluaran.php">Lihat</a>
      </div>
      <div class="contenTransaksiTerbaru">
        <div class="cardTransaksiTerbaru">
          <div class="titleCardTransaksi">
            <div class="transaksiIcon">
              <img src="./src/image/shopping.png" alt="food icon" />
            </div>
            <div class="titleTransaksi">
              <h3>Nasi Goreng</h3>
              <p>Makanan</p>
            </div>
          </div>
          <div class="hargaBrng">
            <h3>- 50.000</h3>
            <p>Hari ini</p>
          </div>
        </div>

        <div class="cardTransaksiTerbaru">
          <div class="titleCardTransaksi">
            <div class="transaksiIcon">
              <img src="./src/image/sallary.png" alt="food icon" />
            </div>
            <div class="titleTransaksi">
              <h3>Nasi Goreng</h3>
              <p>Makanan</p>
            </div>
          </div>
          <div class="hargaBrng">
            <h3>- 50.000</h3>
            <p>Hari ini</p>
          </div>
        </div>
        <div class="cardTransaksiTerbaru">
          <div class="titleCardTransaksi">
            <div class="transaksiIcon">
              <img src="./src/image/foodLogo.png" alt="food icon" />
            </div>
            <div class="titleTransaksi">
              <h3>Nasi Goreng</h3>
              <p>Makanan</p>
            </div>
          </div>
          <div class="hargaBrng">
            <h3>- 50.000</h3>
            <p>Hari ini</p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <div class="containerFooterNavbar">
      <div class="homeicon active">
        <a href="index.php"><img src="./src/image/homeIcon.png" alt="home" /></a>
      </div>
      <div class="createIcon">
        <a href="buat_transaksi.php"><img src="./src/image/createIcon.png" alt="create" /></a>
      </div>
      <div class="historyIcon">
        <a href="riwayat_pengeluaran.php"><img src="./src/image/historyIcon.png" alt="history" /></a>
      </div>
    </div>
  </footer>
</body>

</html>