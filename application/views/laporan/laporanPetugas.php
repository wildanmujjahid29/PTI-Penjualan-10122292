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
    <H2 style="text-align:center"> Data Petugas</H2>
    <p>Tanggal Cetak : <?= date('d F Y'); ?></p>
    <table id="a">
        <tr>
            <th>ID Penjualan</th>
            <th>Nama Barang</th>
            <th>Email</th>
        </tr>
        <?php
        foreach ($dataPetugas as $petugas) {
        ?>
            <tr>
                <td><?= $petugas->idUser ?></td>
                <td><?= $petugas->nama ?></td>
                <td><?= $petugas->email ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>