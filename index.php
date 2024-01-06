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
  <style>
    main {
      margin-bottom: 100px;
    }
  </style>
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
    $dompet = mysqli_fetch_assoc($query_dompet);

    // Mengambil saldo dompet pada field dana dengan menggunakan id
    $query_bank = mysqli_query($conn, "SELECT *  FROM tb_dana where id_dana='2'");
    $bank = mysqli_fetch_assoc($query_bank);

    // melakuakn inner join untuk menampilkan di transaksi terbaru
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

    <?php

    include 'koneksi.php';

    $hasil = array();

    // query data pemasukan dan lakukan join ke table dana untuk mendapatkan category
    $query_pemasukan = mysqli_query($conn, 'SELECT * FROM tb_pemasukan INNER JOIN tb_dana ON tb_pemasukan.id_dana=tb_dana.id_dana');
    // ambil data pemasukan dan tambahkan ke array hasil
    while($data_pemasukan = mysqli_fetch_assoc($query_pemasukan)) {
        $hasil[] = $data_pemasukan;
    }

    // query data pengeluaran dan lakukan join ke table dana untuk mendapatkan category
    $query_pengeluaran = mysqli_query($conn, 'SELECT * FROM tb_pengeluaran INNER JOIN tb_dana ON tb_pengeluaran.id_dana=tb_dana.id_dana');
    // ambil data pengeluaran dan tambahkan ke array hasil
    while($data_pengeluaran = mysqli_fetch_assoc($query_pengeluaran)) {
        $hasil[] = $data_pengeluaran;
    }

    // Mengurutkan array menggunakan fungsi kostum -> sort_by_date
    // referensi: https://www.w3schools.com/php/func_array_uasort.asp
    usort($hasil, "sort_by_date");

    function sort_by_date($a, $b)
    {
        // mengubah tanggal menjadi detik
        // referensi: https://www.w3schools.com/php/func_date_strtotime.asp
        $timeA = strtotime($a['tanggal']);
        $timeB = strtotime($b['tanggal']);

        if($timeA == $timeB) {
            return 0;
        } // 0 menandakan bahwa tidak ada perubahan dalam urutan array
        return $timeA < $timeB ? 1 : -1;
        // -1 menandakan bahwa posisi a akan ditempatkan sebelum b
        // 1 menandakan bahwa posisi a akan ditempatkan setelah b
        // Referensi: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/sort
    }

    for ($i = 0; $i < count($hasil); $i++) {
        ?>
        <div class="contenTransaksiTerbaru">
          <div class="cardTransaksiTerbaru">
            <div class="titleCardTransaksi">
              <div class="transaksiIcon">
                <img src="./src/image/shopping.png" alt="food icon" />
              </div>
              <div class="titleTransaksi">
                <?php if(isset($hasil[$i]['sumber'])) : ?>
                  <h3><?= $hasil[$i]['sumber'] ?></h3>
                  <?php else: ?>
                    <h3><?= $hasil[$i]['untuk'] ?></h3>
                  <?php endif; ?>
                <p><?= $hasil[$i]['category'] ?></p>
              </div>
            </div>
            <div class="hargaBrng">
              <?php if(isset($hasil[$i]['penghasilan'])) : ?>
                <h3 style="color:green">+ <?= number_format($hasil[$i]['penghasilan']) ?></h3>
                <?php else: ?>
                  <h3 style="color:red">- <?= number_format($hasil[$i]['harga']) ?></h3>
                <?php endif; ?>
              <p><?= $hasil[$i]['tanggal'] ?></p>
            </div>
          </div>
        </div>
      <?php
    }
    ?>
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