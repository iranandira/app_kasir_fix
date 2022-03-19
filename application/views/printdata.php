<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?= base_url('template/bootstrap.min.css') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail transaksi</title>
</head>
<body>
   <div class="container">
    <br>
    <br>
    <h1>Detail transaksi</h1>
    <?php 
        foreach($trs as $trs):
            $trs_id= $trs->pk_transaksi_id;
            $notransaksi= $trs->pk_transaksi_id;
            $tanggal= $trs->tanggal_transaksi;
            $member= $trs->tipe_konsumen;
            $bayar= $trs->bayar;
        endforeach;

        if(!empty($datamember)){
            foreach($datamember as $dm):
                $status_member = $dm->tipe_member;
            endforeach;
        }
        else{
            $status_member = '';
        }
    ?>
    <table>
        <tr>
            <td>No Transaksi</td>
            <td>:</td>
            <td><?=$notransaksi; ?></td>
        </tr>

        <tr>
            <td>Tanggal Transaksi</td>
            <td>:</td>
            <td><?= $tanggal;?></td>
        </tr>

        <tr>
            <td>Tipe Member</td>
            <td>:</td>
            <td><?=$member.' '.$status_member?></td>
        </tr>
    </table>
    <hr>
    <br>
     <table class="table table-bordered" width="80%">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kuantitas</th>
            <th>Harga Satuan</th>
            <th>Total</th>
            
        </tr>
        <?php 
            $no=1;
            $grand =0;
            foreach($hasil as $hsl):
                $harga = $hsl->harga;
                $kuantitas = $hsl->kuantitas;
                $total = $harga*$kuantitas;
        ?>
        <tr>
            <td><?= $no;?></td>
            <td><?= $hsl->nama_barang?></td>
            <td><?= $kuantitas.' '.$hsl->nama_satuan?></td>
            <td><?= "Rp.".number_format($harga)?></td>
            <td><?= "Rp.".number_format($total)?></td>
        </tr>
        <?php 
            $no++;
            $grand += $total;
            endforeach; ?>
    </table>
     <?php 
        if($status_member   == 'clasic'){
            $persen= 2*$grand/100;
            $grandtotal = $grand-$persen;
        }else if($status_member  == 'premium'){
            $persen= 10*$grand/100;
            $grandtotal = $grand-$persen;
        }
        else{
            $persen= 0;
            $grandtotal = $grand;
        }
     ?>
     <br>
    <form action="<?=base_url('Home/saveprint_transaksi') ?>" method="post">
    <input type="hidden" name="transaksi_id" value=<?=$trs_id ?>>
         <table>
            <tr>
                <td>Harga Asal</td>
                <td>:</td>
                <td><?="Rp.".number_format($grand)?></td>
            </tr>

            <tr>
                <td>Diskon</td>
                <td>:</td>
                <td><?="Rp.".number_format($persen) ?></td>
            </tr>

            <tr>
                <td>Total Belanja</td>
                <td>:</td>
                <td><?="Rp.".number_format($grandtotal) ?></td>
            </tr>

            <tr>
                <td>Bayar</td>
                <td>:</td>
                <td><?="Rp.".number_format($bayar) ?></td>
            </tr>

            <tr>
                <td>Kembali</td>
                <td>:</td>
                <td><?="Rp.".number_format($bayar-$grandtotal) ?></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>

<script>
    window.print();
</script>