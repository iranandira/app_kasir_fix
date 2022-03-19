<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data satuan</title>
</head>
<body>
    <div class="container">
        <br>
    <h1>Data satuan</h1>
   <a href="<?=base_url('Home/tambahsatuan') ?>"><button type="button" class="btn btn-primary">Tambah</button></a> 
   <br>
   <br>
    <table class="table table-bordered table-striped">
        <tr>
            <th>No Satuan</th>
            <th>Nama Satuan</th>
            <th>Aksi</th>
        </tr>

        <?php 
            foreach($satuan as $stn):
        ?>
        <tr>
            <td><?="ST.",$stn->pk_satuan_id ?></td>
            <td><?=$stn->nama_satuan ?></td>
            <td> <a href="<?= base_url('Home/hapussatuan/'.$stn->pk_satuan_id) ?>"> Hapus</a></td>
        </tr>
        <?php endforeach ?>
    </table>
    </div>
</body>
</html>