<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
</head>
<body>
    <div class="container">
        <br>
    <h1>Data Kategori</h1>
   <a href="<?=base_url('Home/tambahkategori')?> "><button type="button" class="btn btn-primary">Tambah</button></a> 
    <br>
    <br>
        <table class="table table-bordered table-striped">
            <tr>
                <th>No Kategori</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>

            <?php 
            foreach ($kategori as $ktg):
            ?>
            
            <tr>
            <td><?="KT.",$ktg->pk_kategori_id ?></td>
            <td><?=$ktg->nama_kategori ?></td>
            <td> <a href="<?=base_url('Home/hapuskategori/'.$ktg->pk_kategori_id) ?>">Hapus</a></td>
            </tr>
            <?php endforeach;?>
        </table>
        </div>
</body>
</html>

