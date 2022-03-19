<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?=base_url('template/bootstrap.min.css') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data member</title>
</head>
<body>
    <div class="container">
        <br>
    <h1>Data member</h1>
  <a href="<?=base_url('Home/tambahmember') ?>"><button type="button" class="btn btn-primary">Tambah</button></a>  
    <br>
    <br>
    <table class="table table-bordered table-striped">
        <tr>
            <th>No member</th>
            <th>Nama member</th>
            <th>Alamat</th>
            <th>No hp</th>
            <th>Tipe member</th>
            <th>Dibuat pada</th>
            <th>Hapus</th>
        </tr>

        <?php 
        foreach($datamember as $mb):
       ?>

        <tr>
            <td><?= "MB.",$mb->pk_member_id?></td>
            <td><?=$mb->nama_member?></td>
            <td><?=$mb->alamat?></td>
            <td><?=$mb->no_hp?></td>
            <td><?=$mb->tipe_member?></td>
            <td><?=$mb->dibuat_pada?></td>
            <td> <a href="<?=base_url('Home/hapusmember/'.$mb->pk_member_id) ?>">Hapus </a> 
           <a href="<?=base_url('Home/printmember/'.$mb->pk_member_id) ?>">| Print</td></a> 
        </tr>
        <?php  endforeach; ?>
    </table>
    </div>
</body>
</html>