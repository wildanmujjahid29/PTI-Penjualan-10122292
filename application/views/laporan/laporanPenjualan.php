<!DOCTYPE html>
<html>

<head>
    <style>
        #a {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #a td,
        #a th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #a tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #a tr:hover {
            background-color: #ddd;
        }

        #a th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <H2 style="text-align:center"> Data Penjualan</H2>
    <p>Tanggal Cetak : <?= date('d F Y'); ?></p>
    <table id="a">
        <tr>
            <th>ID Penjualan</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Tanggal Transaksi</th>
            <th>Kuantitas</th>
            <th>Total</th>
            <th>Nama Petugas</th>
        </tr>
        <?php
        foreach ($dataPenjualan as $penjualan) {
        ?>
            <tr>
                <td><?= $penjualan->idPenjualan ?></td>
                <td><?= $penjualan->namaBarang ?></td>
                <td><?= number_format($penjualan->harga, 0, ',', '.') ?></td>
                <td><?= date('d F Y', strtotime($penjualan->tglTransaksi)) ?></td>
                <td><?= $penjualan->qty ?></td>
                <td>Rp <?= number_format($penjualan->harga * $penjualan->qty, 0, ',', '.') ?></td>
                <td><?= $penjualan->nama ?></td>

            </tr>
        <?php } ?>
    </table>
</body>

</html>