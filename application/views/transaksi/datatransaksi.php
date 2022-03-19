<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
</head>
<body>
    <div class="container">
        <br>
    <h1>Data transaksi</h1>
   <a href="<?=base_url('Home/tambahtransaksi') ?>"><button type="button" class="btn btn-primary">Tambah</button></a>
    <br>
    <br>
    <table class="table table-bordered table-striped">
        <tr>
            <th>No Transaksi</th>
            <th>Tipe konsumen</th>
            <th>Tanggal Transaksi</th>
            <th>Bayar</th>
            <th>Aksi </th>
        </tr>
            <?php
                $total= 0;
                foreach($transaksi as $trs):
            ?>
        <tr>
            <td><?="TRS.", $trs->pk_transaksi_id ?></td>
            <td><?=$trs->tipe_konsumen ?></td>
            <td><?=$trs->tanggal_transaksi ?></td>
            <td><?="Rp.".number_format($trs->bayar) ?></td>
            <td> <a href="<?=base_url('Home/hapustransaksi/'.$trs->pk_transaksi_id) ?>">hapus</a></td>
        </tr>
        <?php 
            $total += $trs->bayar;
             endforeach; ?>
    </table>
    <br>
    Total semua transaksi = <?="Rp.".number_format($total) ?>
    </div>
</body>
</html>