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
    <H2 style="text-align:center"> Data Barang</H2>
    <p>Tanggal Cetak : <?= date('d F Y'); ?></p>
    <table id="a">
        <tr>
            <th>ID Barang</th>
            <th>Foto</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        <?php
        foreach ($dataBarang as $barang) {
        ?>
            <tr>
                <td><?= $barang->idBarang ?></td>
                <td><img src="<?php echo base_url('assets/gambar/' . $barang->foto); ?>" width="100" height="100"> </td>
                <td><?= $barang->namaBarang ?></td>
                <td><?= $barang->harga ?></td>
                <td><?= $barang->stok ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>