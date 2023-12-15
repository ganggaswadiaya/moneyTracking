<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Saldo ATM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./src/style/style-pemasukan.css">
</head>

<body>
    <div class="form">
        <form action="proses_pengeluaran.php" method="post">
            <h1>Pengeluaran</h1>
            <hr>
            <table border="0" cellpadding="5">
                <tr>
                    <td>Pengeluaran untuk</td>
                    <td>:</td>
                    <td><input type="text" name="untuk" required></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td><input type="text" name="harga" required></td>
                <tr>
                    <td>Jumlah</td>
                    <td>:</td>
                    <td><input type="text" name="jumlah" required></td>
                </tr>
                <tr>
                    <td>Bayar menggunakan</td>
                    <td>:</td>
                    <td><select name="id_dana" id="" required>

                            <option value="2">BCA</option>
                            <option value="3">Dompet</option>

                        </select></td>
                </tr>
                <tr>
                    <td>Tanggal Pengeluaran</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal" required></td>
            </table>
            <input class="btn" type="submit" value="Kirim">
            <a class="batal" href="buat_transaksi.php">Batal</a>
        </form>
    </div>
</body>

</html>