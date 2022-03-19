<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body>
    <div class="container">
        <br>
    <h1>Data Barang</h1>
     <a href="<?=base_url('Home/tambahbarang') ?>"> <button type="button"  class="btn btn-primary">Tambah</button></a>
    <br>
    <br>
    <table class="table table-bordered table-striped">
        <tr>
            <th>No Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php foreach($barang as $brg):
         ?>
         <tr>
            <td><?= "BR.",$brg->pk_barang_id?></td>
            <td><?=$brg->nama_barang?></td>
            <td><?=$brg->nama_kategori?></td>
            <td><?=$brg->nama_satuan?></td>
            <td><?= "Rp.".number_format($brg->harga)?></td>
            <td><?=$brg->stok?></td>
            <td> <a href="<?=base_url('Home/hapusbarang/'.$brg->pk_barang_id) ?>">Hapus</a></td>
         </tr>
         <?php endforeach; ?>
    </table>
    </div>
</body>
</html>