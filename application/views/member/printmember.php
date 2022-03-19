<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    foreach ($datamember as $mm):
        $member_id = $mm->pk_member_id;
        $nama = $mm->nama_member;
        $alamat = $mm->alamat;
        $no_hp = $mm->no_hp;
        $tipe_member = $mm->tipe_member;
        $dibuat_pada = $mm->dibuat_pada;
    endforeach;
    ?>
    <center>
      <h2>Member card</h2>
      <table>
         <tr>
            <td>Member id</td>
            <td>:</td>
            <td><?= $member_id ?></td>
         </tr>
         <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $nama ?></td>
         </tr>
         <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $alamat ?></td>
         </tr>
         <tr>
            <td>No hp</td>
            <td>:</td>
            <td><?= $no_hp ?></td>
         </tr>
         <tr>
            <td>Tipe member</td>
            <td>:</td>
            <td><?= $tipe_member ?></td>
         </tr>
         <tr>
            <td>Dibuat pada</td>
            <td></td>
            <td><?= $dibuat_pada ?></td>
         </tr>
      </table>
    </center>
</body>
</html>
<script>
  window.print();
</script>